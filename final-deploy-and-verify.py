"""Re-deploy all SEO-fix files and run a comprehensive verification."""
import paramiko, hashlib, time, sys
from pathlib import Path
PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"
LOCAL = Path("f:/Certificates/khaled")

FILES = [
    "app/Http/Middleware/ForceCanonicalDomain.php",
    "app/Http/Middleware/TrustProxies.php",
    "app/Http/Kernel.php",
    ".htaccess",
    "public/.htaccess",
    "app/Http/Controllers/PageController.php",
    "app/Services/BlogService.php",
]

def md5_local(p): return hashlib.md5(Path(p).read_bytes()).hexdigest()

for attempt in range(3):
    try:
        client = paramiko.SSHClient()
        client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        client.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
                       look_for_keys=False, allow_agent=False, timeout=20)
        sftp = client.open_sftp()
        print(f"connected on attempt {attempt+1}\n")
        break
    except Exception as e:
        print(f"attempt {attempt+1} failed: {e}")
        if attempt < 2: time.sleep(30)
else:
    sys.exit("Could not connect")

# Compare md5 of each file local vs remote, re-upload if different
print("=" * 60)
print("STAGE 1: FILE SYNC CHECK + RE-DEPLOY IF NEEDED")
print("=" * 60)
for rel in FILES:
    local_path = LOCAL / rel
    remote_path = f"{REMOTE_ROOT}/{rel}"
    local_hash = md5_local(local_path)
    _, out, _ = client.exec_command(f"md5sum {remote_path} 2>/dev/null | awk '{{print $1}}'")
    remote_hash = out.read().decode().strip()
    if local_hash == remote_hash:
        print(f"  [SYNC] {rel}  md5={local_hash[:8]}")
    else:
        # Re-upload
        client.exec_command(f"test -f {remote_path} && cp {remote_path} {remote_path}.bak.$(date +%s)")[1].channel.recv_exit_status()
        sftp.put(str(local_path), remote_path)
        print(f"  [PUSH] {rel}  local={local_hash[:8]}  was={remote_hash[:8] or 'MISSING'}")
sftp.close()

# Cache clear (always, just to be safe)
print("\n=" + "=" * 59)
print("STAGE 2: CLEAR LARAVEL CACHES")
print("=" * 60)
_, out, _ = client.exec_command(f"cd {REMOTE_ROOT} && php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan optimize:clear", timeout=60)
print(out.read().decode())

# Verify
print("=" * 60)
print("STAGE 3: LIVE VERIFICATION")
print("=" * 60)

verify = r'''
echo "--- (1) Syntax of the 3 PHP files ---"
php -l domains/khaledahmed.net/public_html/app/Http/Middleware/ForceCanonicalDomain.php
php -l domains/khaledahmed.net/public_html/app/Http/Middleware/TrustProxies.php
php -l domains/khaledahmed.net/public_html/app/Http/Kernel.php

echo
echo "--- (2) Middleware is registered in Kernel.php ---"
grep -n "ForceCanonicalDomain" domains/khaledahmed.net/public_html/app/Http/Kernel.php

echo
echo "--- (3) TrustProxies set to '*' ---"
grep -n 'proxies' domains/khaledahmed.net/public_html/app/Http/Middleware/TrustProxies.php | head -3

echo
echo "--- (4) .htaccess has X-Forwarded-Host www match ---"
grep -n "X-Forwarded-Host" domains/khaledahmed.net/public_html/.htaccess | head -3

echo
echo "=== www/non-www redirect tests ==="
for u in "https://www.khaledahmed.net/" "https://www.khaledahmed.net/services" "https://www.khaledahmed.net/blogs" "https://www.khaledahmed.net/portfolios" "https://www.khaledahmed.net/about" "https://www.khaledahmed.net/contact" "https://www.khaledahmed.net/plans"; do
  code=$(curl -sI "$u" 2>/dev/null | grep -i "^HTTP" | head -1 | awk '{print $2}')
  loc=$(curl -sI "$u" 2>/dev/null | grep -i "^location" | head -1 | awk '{print $2}' | tr -d '\r')
  printf "  %-65s -> %s %s\n" "$u" "$code" "$loc"
done

echo "=== non-www (must stay 200, no loops) ==="
for u in "https://khaledahmed.net/" "https://khaledahmed.net/services" "https://khaledahmed.net/blogs" "https://khaledahmed.net/portfolios" "https://khaledahmed.net/plans" "https://khaledahmed.net/blog/react-vs-vue-2026" "https://khaledahmed.net/blog/build-saas-mvp-laravel-react-2026" "https://khaledahmed.net/blog/nextjs-performance-optimization-2026"; do
  code=$(curl -sI "$u" 2>/dev/null | grep -i "^HTTP" | head -1 | awk '{print $2}')
  printf "  %-65s -> %s\n" "$u" "$code"
done

echo
echo "=== ?tag redirect ==="
curl -sI "https://khaledahmed.net/blogs?tag=web+development" 2>/dev/null | grep -iE "^HTTP|^location" | head -2 | tr -d '\r'
echo "=== www ?tag redirect ==="
curl -sI "https://www.khaledahmed.net/blogs?tag=web+development" 2>/dev/null | grep -iE "^HTTP|^location" | head -2 | tr -d '\r'

echo
echo "=== PDF noindex header (non-www) ==="
curl -sI "https://khaledahmed.net/Khaled_Ahmed.pdf" 2>/dev/null | grep -iE "^HTTP|x-robots" | head -2 | tr -d '\r'

echo
echo "=== Canonical tags on key pages (must self-reference non-www) ==="
for u in "https://khaledahmed.net/plans" "https://khaledahmed.net/blog/react-vs-vue-2026" "https://khaledahmed.net/blog/category/backend"; do
  canon=$(curl -s "$u" | grep -oiE '<link[^>]*rel="canonical"[^>]*href="[^"]*"' | head -1 | grep -oE 'href="[^"]*"')
  printf "  %-60s %s\n" "$u" "$canon"
done

echo
echo "=== Sitemap reachable ==="
curl -sI "https://khaledahmed.net/sitemap.xml" | grep -i "^HTTP" | head -1
echo "URLs in sitemap: $(curl -s https://khaledahmed.net/sitemap.xml | grep -c '<loc>')"

echo
echo "=== robots.txt ==="
curl -sI "https://khaledahmed.net/robots.txt" | grep -i "^HTTP" | head -1
'''
_, out, err = client.exec_command(verify, timeout=120)
print(out.read().decode())
e = err.read().decode()
if e.strip():
    print("--- STDERR ---")
    print(e)
client.close()
print("\nDONE")
