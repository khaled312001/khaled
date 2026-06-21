"""Take workflow translation output and replace placeholder content_ar blocks in BlogService.php.
Reads translations from a JSON file (workflow output) and surgically replaces only the placeholder posts.
"""
import json, re, sys, time, paramiko
from pathlib import Path
import urllib.request, ssl

LOCAL = Path("f:/Certificates/khaled")
BLOG = LOCAL / "app/Services/BlogService.php"
TRANS_FILE = LOCAL / "translations-output.json"
PASSWORD = "support@Passord123support@Passord123"
REMOTE = "domains/khaledahmed.net/public_html/app/Services/BlogService.php"


def sanitize(html: str) -> str:
    """Make HTML safe for embedding in <<<'HTML' nowdoc."""
    # The closing token "HTML" on a line by itself would terminate the heredoc.
    # Replace it defensively (extremely unlikely to occur in content).
    html = html.replace("\r", "")
    html = "\n".join(line.rstrip() for line in html.split("\n"))
    # Defensive: rewrite "HTML" on its own line
    html = re.sub(r"^HTML$", "HTM&#76;", html, flags=re.MULTILINE)
    return html.strip()


def splice_one(php_src: str, slug: str, new_ar: str) -> tuple[str, bool]:
    """Replace the content_ar nowdoc body for the given slug."""
    # Match: 'slug' => '<slug>', ... 'content_ar' => <<<'HTML'\n(body)\nHTML,
    pattern = re.compile(
        r"('slug'\s*=>\s*'" + re.escape(slug) + r"'.*?'content_ar'\s*=>\s*<<<'HTML'\n)"
        r"(.*?)"
        r"(\nHTML,)",
        re.DOTALL
    )
    new_src, n = pattern.subn(lambda m: m.group(1) + sanitize(new_ar) + m.group(3), php_src, count=1)
    return new_src, n == 1


def main():
    if not TRANS_FILE.exists():
        sys.exit(f"Expected translations at {TRANS_FILE}")

    data = json.loads(TRANS_FILE.read_text(encoding="utf-8"))
    translations = data.get("translations", [])
    failed = data.get("failed", [])
    summary = data.get("summary", {})

    print(f"Workflow summary: {summary}")
    if failed:
        print(f"Failed (skipping): {[f['slug'] for f in failed]}")
    if not translations:
        sys.exit("No translations to apply.")

    php_src = BLOG.read_text(encoding="utf-8")
    backup = BLOG.with_suffix(".php.bak.before-translations")
    backup.write_text(php_src, encoding="utf-8")

    applied, skipped = [], []
    for t in translations:
        new_src, ok = splice_one(php_src, t["slug"], t["content_ar"])
        if ok:
            php_src = new_src
            applied.append(t["slug"])
        else:
            skipped.append(t["slug"])

    BLOG.write_text(php_src, encoding="utf-8")
    print(f"\nApplied {len(applied)} translations.")
    print(f"Skipped {len(skipped)} (slug not found / pattern mismatch): {skipped}")

    # Connect and deploy
    for attempt in range(3):
        try:
            client = paramiko.SSHClient()
            client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
            client.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
                           look_for_keys=False, allow_agent=False, timeout=20)
            sftp = client.open_sftp()
            print(f"\nSSH connected (attempt {attempt+1})")
            break
        except Exception as e:
            print(f"attempt {attempt+1} failed: {e}")
            if attempt < 2: time.sleep(30)
    else:
        sys.exit("Could not connect")

    client.exec_command(f"cp {REMOTE} {REMOTE}.bak.$(date +%s)")[1].channel.recv_exit_status()
    sftp.put(str(BLOG), REMOTE)
    sftp.close()
    print("Uploaded BlogService.php")

    _, out, _ = client.exec_command(f"cd domains/khaledahmed.net/public_html && php -l app/Services/BlogService.php", timeout=60)
    syn = out.read().decode().strip()
    print(f"Syntax: {syn}")
    if "No syntax errors" not in syn:
        # Rollback
        client.exec_command(f"ls -t {REMOTE}.bak.* 2>/dev/null | head -1 | xargs -I{{}} cp {{}} {REMOTE}")[1].channel.recv_exit_status()
        client.close()
        sys.exit("Syntax error — rolled back.")

    _, out, _ = client.exec_command(f"cd domains/khaledahmed.net/public_html && php artisan view:clear && php artisan config:clear && php artisan route:clear", timeout=60)
    print(out.read().decode())

    # Verify each post by fetching the Arabic version (set cookie to ar)
    ctx = ssl.create_default_context()
    print("=== verify Arabic content live ===")
    fails = []
    for slug in applied:
        url = f"https://khaledahmed.net/blog/{slug}"
        # Set Arabic locale cookie
        req = urllib.request.Request(url, headers={
            "User-Agent": "Mozilla/5.0",
            "Cookie": "site_locale=ar",
        })
        try:
            r = urllib.request.urlopen(req, context=ctx, timeout=20)
            body = r.read().decode("utf-8", errors="replace")
            has_placeholder = "المقال الكامل متاح بالإنجليزي" in body
            print(f"  {'BAD ' if has_placeholder else 'OK  '} {r.status}  {slug}{'  (still placeholder!)' if has_placeholder else ''}")
            if has_placeholder: fails.append(slug)
        except Exception as e:
            print(f"  ERR {slug}: {e}")
            fails.append(slug)

    client.close()
    print(f"\nDONE. Applied: {len(applied)}. Live verified: {len(applied) - len(fails)}. Fails: {fails}")


if __name__ == "__main__":
    main()
