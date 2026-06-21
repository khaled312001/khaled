"""Take the seo-mega-push workflow output (JSON saved to seo-mega-output.json)
and deploy: insert blog posts into BlogService.php, optionally enhance services
FAQ block, upload to server, clear caches, and verify each new post returns 200.

Idempotent — skips slugs already present.
"""
import json
import re
import sys
import time
import paramiko
import urllib.request
import ssl
from pathlib import Path

LOCAL = Path("f:/Certificates/khaled")
OUT = LOCAL / "seo-mega-output.json"
BLOG = LOCAL / "app/Services/BlogService.php"
PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"


def to_php_string(s: str) -> str:
    """Single-quoted PHP string with proper escaping."""
    return "'" + s.replace("\\", "\\\\").replace("'", "\\'") + "'"


def to_php_array(items: list) -> str:
    return "[" + ", ".join(to_php_string(t) for t in items) + "]"


def sanitize_content(html: str) -> str:
    """Make HTML safe for embedding in <<<'POST_BODY_HTML' nowdoc."""
    # Nowdoc closes when the identifier appears at start of a line (or indented in PHP 7.3+).
    # Replace any accidental occurrences of the closing marker.
    html = html.replace("POST_BODY_HTML", "POSTBODYHTML")
    # Strip carriage returns
    html = html.replace("\r", "")
    # Strip trailing whitespace per line
    html = "\n".join(line.rstrip() for line in html.split("\n"))
    return html.strip()


def to_php_entry(post: dict) -> str:
    """Render a single blog post as a PHP array entry, matching BlogService.php style."""
    indent = " " * 12  # 12 spaces to match existing entries
    inner = " " * 16
    lines = [indent + "["]
    str_fields = ["slug", "title", "title_ar", "excerpt", "excerpt_ar", "category"]
    for f in str_fields:
        lines.append(f"{inner}{to_php_string(f)} => {to_php_string(post[f])},")
    lines.append(f"{inner}'tags' => {to_php_array(post['tags'])},")
    for f in ["image", "date", "read_time", "meta_title", "meta_description"]:
        lines.append(f"{inner}{to_php_string(f)} => {to_php_string(post[f])},")
    # Optional Arabic meta
    if post.get("meta_title_ar"):
        lines.append(f"{inner}'meta_title_ar' => {to_php_string(post['meta_title_ar'])},")
    if post.get("meta_description_ar"):
        lines.append(f"{inner}'meta_description_ar' => {to_php_string(post['meta_description_ar'])},")
    # Arabic content nowdoc
    lines.append(f"{inner}'content_ar' => <<<'POST_BODY_HTML'")
    lines.append(sanitize_content(post["content_ar"]))
    lines.append("POST_BODY_HTML,")
    # English content nowdoc
    lines.append(f"{inner}'content' => <<<'POST_BODY_HTML'")
    lines.append(sanitize_content(post["content"]))
    lines.append("POST_BODY_HTML")
    lines.append(indent + "],")
    return "\n".join(lines)


def insert_posts_into_blogservice(php_src: str, new_entries: list[str], already_present: set[str]) -> tuple[str, int]:
    """Find the posts() return array, insert entries before its closing `];`.
    Skips entries whose slug is already in php_src."""
    pattern = re.compile(
        r"(private static function posts\(\): array\s*\{\s*return \[)(.*?)(\n        \];\s*\n    \}\s*\n\})",
        re.DOTALL,
    )
    m = pattern.search(php_src)
    if not m:
        raise RuntimeError("Could not find posts() return array in BlogService.php")
    open_part, body, close_part = m.group(1), m.group(2), m.group(3)
    insert_block = "\n".join(new_entries) + "\n"
    new_src = php_src[: m.start()] + open_part + body + "\n" + insert_block + close_part + php_src[m.end():]
    return new_src, len(new_entries)


def main():
    if not OUT.exists():
        sys.exit(f"Expected workflow output at {OUT}")

    data = json.loads(OUT.read_text(encoding="utf-8"))
    articles = data.get("articles", [])
    print(f"Received {len(articles)} articles from workflow.")
    if not articles:
        sys.exit("No articles to insert.")

    # Read existing BlogService.php
    php_src = BLOG.read_text(encoding="utf-8")
    existing_slugs = set(re.findall(r"'slug'\s*=>\s*'([^']+)'", php_src))
    print(f"Existing post slugs: {len(existing_slugs)}")

    # Filter out already-present slugs
    new_articles = [a for a in articles if a["slug"] not in existing_slugs]
    skipped = [a["slug"] for a in articles if a["slug"] in existing_slugs]
    if skipped:
        print(f"Skipping {len(skipped)} already-present: {skipped}")
    print(f"Inserting {len(new_articles)} new posts.")

    # Serialize
    entries = [to_php_entry(a) for a in new_articles]
    new_src, count = insert_posts_into_blogservice(php_src, entries, existing_slugs)

    # Update count comment
    total = len(existing_slugs) + count
    new_src = re.sub(
        r"\*\s*\d+\s*real blog posts? curated by Khaled\.|\*\s*\d+\s*real blog posts? .*",
        f"* {total} real blog posts curated by Khaled Ahmed.",
        new_src,
        count=1,
    )

    # Write locally
    backup_local = BLOG.with_suffix(".php.bak.local")
    backup_local.write_text(php_src, encoding="utf-8")
    BLOG.write_text(new_src, encoding="utf-8")
    print(f"Local BlogService.php updated. Backup: {backup_local.name}")

    # Syntax check locally if php available — skipped (Windows). Will check on server.

    # Connect and deploy
    for attempt in range(3):
        try:
            client = paramiko.SSHClient()
            client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
            client.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
                           look_for_keys=False, allow_agent=False, timeout=20)
            sftp = client.open_sftp()
            print(f"SSH connected (attempt {attempt+1})")
            break
        except Exception as e:
            print(f"attempt {attempt+1} failed: {e}")
            if attempt < 2: time.sleep(30)
    else:
        sys.exit("Could not connect")

    # Backup remote + upload
    remote = f"{REMOTE_ROOT}/app/Services/BlogService.php"
    client.exec_command(f"cp {remote} {remote}.bak.$(date +%s)")[1].channel.recv_exit_status()
    sftp.put(str(BLOG), remote)
    print("Uploaded BlogService.php")
    sftp.close()

    # Syntax check + cache clear on server
    syn = f"cd {REMOTE_ROOT} && php -l app/Services/BlogService.php"
    _, out, _ = client.exec_command(syn, timeout=60)
    syn_out = out.read().decode().strip()
    print(f"Syntax check: {syn_out}")
    if "No syntax errors" not in syn_out:
        print("SYNTAX ERROR — rolling back remote.")
        client.exec_command(f"ls -t {remote}.bak.* | head -1 | xargs -I{{}} cp {{}} {remote}")[1].channel.recv_exit_status()
        client.close()
        sys.exit("Aborted due to syntax error. Remote rolled back.")

    _, out, _ = client.exec_command(f"cd {REMOTE_ROOT} && php artisan view:clear && php artisan route:clear && php artisan config:clear", timeout=60)
    print(out.read().decode())

    # Verify each new post returns 200 + appears on /blogs
    ctx = ssl.create_default_context()

    def fetch_status(url):
        try:
            req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
            r = urllib.request.urlopen(req, context=ctx, timeout=20)
            return r.status
        except Exception as e:
            return str(e)

    print("\n=== verify ===")
    fails = []
    for a in new_articles:
        url = f"https://khaledahmed.net/blog/{a['slug']}"
        st = fetch_status(url)
        ok = st == 200
        print(f"  {'OK ' if ok else 'BAD'} {st}  {url}")
        if not ok: fails.append(a["slug"])

    # Also check /blogs landing page has more posts now
    print(f"\nsitemap URL count:")
    _, out, _ = client.exec_command(f"curl -s https://khaledahmed.net/sitemap.xml | grep -c '<loc>'")
    print(out.read().decode().strip())

    client.close()
    print(f"\nDONE. Inserted: {len(new_articles)}.  Failed: {len(fails)}: {fails}")


if __name__ == "__main__":
    main()
