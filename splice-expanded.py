"""Take workflow output (expanded EN + AR per post) and splice into BlogService.php.
Replaces BOTH content_en and content_ar nowdoc bodies. Then deploys + verifies."""
import json, re, sys, time, paramiko
from pathlib import Path
import urllib.request, ssl

LOCAL = Path("f:/Certificates/khaled")
BLOG = LOCAL / "app/Services/BlogService.php"
TRANS_FILE = LOCAL / "expansion-output.json"
PASSWORD = "support@Passord123support@Passord123"
REMOTE = "domains/khaledahmed.net/public_html/app/Services/BlogService.php"


def sanitize(html: str) -> str:
    html = html.replace("\r", "")
    html = "\n".join(line.rstrip() for line in html.split("\n"))
    # Defensive: rewrite literal "HTML" on its own line which would close the nowdoc
    html = re.sub(r"^HTML$", "HTM&#76;", html, flags=re.MULTILINE)
    return html.strip()


def splice_post(php_src: str, slug: str, content_en: str, content_ar: str):
    """Replace both content_ar and content_en nowdoc bodies for the given slug."""
    pattern = re.compile(
        r"('slug'\s*=>\s*'" + re.escape(slug) + r"'.*?'content_ar'\s*=>\s*<<<'HTML'\n)"
        r"(.*?)"
        r"(\nHTML,\s*'content'\s*=>\s*<<<'HTML'\n)"
        r"(.*?)"
        r"(\nHTML)",
        re.DOTALL
    )
    def replacer(m):
        return m.group(1) + sanitize(content_ar) + m.group(3) + sanitize(content_en) + m.group(5)
    new_src, n = pattern.subn(replacer, php_src, count=1)
    return new_src, n == 1


def main():
    if not TRANS_FILE.exists():
        sys.exit(f"Expected workflow output at {TRANS_FILE}")

    data = json.loads(TRANS_FILE.read_text(encoding="utf-8"))
    posts = data.get("posts", [])
    summary = data.get("summary", {})
    failed = data.get("failed", [])

    print(f"Workflow summary: {summary}")
    if failed:
        print(f"Failed posts (will NOT be updated): {[f.get('slug') for f in failed]}")
    if not posts:
        sys.exit("No expanded posts to apply.")

    php_src = BLOG.read_text(encoding="utf-8")
    backup = BLOG.with_suffix(".php.bak.before-expansion")
    backup.write_text(php_src, encoding="utf-8")

    applied, skipped = [], []
    for p in posts:
        new_src, ok = splice_post(php_src, p["slug"], p["content_en"], p["content_ar"])
        if ok:
            php_src = new_src
            applied.append(p["slug"])
        else:
            skipped.append(p["slug"])

    BLOG.write_text(php_src, encoding="utf-8")
    print(f"\nApplied {len(applied)} expansions.")
    if skipped:
        print(f"Skipped {len(skipped)} (pattern mismatch): {skipped}")

    # Connect + deploy
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
    print(f"Uploaded BlogService.php ({BLOG.stat().st_size:,} bytes)")

    # Syntax check on server
    _, out, _ = client.exec_command(f"cd domains/khaledahmed.net/public_html && php -l app/Services/BlogService.php", timeout=60)
    syn = out.read().decode().strip()
    print(f"Syntax: {syn}")
    if "No syntax errors" not in syn:
        client.exec_command(f"ls -t {REMOTE}.bak.* 2>/dev/null | head -1 | xargs -I{{}} cp {{}} {REMOTE}")[1].channel.recv_exit_status()
        client.close()
        sys.exit("Syntax error - rolled back.")

    _, out, _ = client.exec_command(f"cd domains/khaledahmed.net/public_html && php artisan view:clear && php artisan config:clear && php artisan route:clear", timeout=60)
    print(out.read().decode())

    # Verify each updated post live (HTML status + word count check)
    ctx = ssl.create_default_context()
    print("=== verify each post live (EN + AR word counts) ===")
    fails = []
    for slug in applied:
        for locale in ["en", "ar"]:
            url = f"https://khaledahmed.net/blog/{slug}"
            req = urllib.request.Request(url, headers={
                "User-Agent": "Mozilla/5.0",
                "Cookie": f"site_locale={locale}",
            })
            try:
                r = urllib.request.urlopen(req, context=ctx, timeout=20)
                body = r.read().decode("utf-8", errors="replace")
                # Extract article body and count words
                m = re.search(r'<div\s+class="article-content"[^>]*>(.*?)</div>\s*<div\s+class="article-tags"', body, re.DOTALL)
                article = m.group(1) if m else ""
                words = len(re.sub(r"<[^>]+>", " ", article).split())
                ok = words >= 1900
                print(f"  [{locale}] {'OK ' if ok else 'BAD'} {words:>5} words  {slug}")
                if not ok: fails.append(f"{slug}/{locale}")
            except Exception as e:
                print(f"  [{locale}] ERR {slug}: {e}")
                fails.append(f"{slug}/{locale}")

    client.close()
    print(f"\nDONE. Applied: {len(applied)}.  Word-count check failures: {len(fails)}")
    if fails: print(f"  - {fails}")


if __name__ == "__main__":
    main()
