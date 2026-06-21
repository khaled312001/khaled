"""Verify all SEO files are synced and the 3 flagged Page-with-redirect URLs behave correctly."""
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
    "routes/web.php",
    "app/Http/Controllers/PageController.php",
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

print("=" * 60)
print("STAGE 1: SYNC CHECK")
print("=" * 60)
any_pushed = False
for rel in FILES:
    local_path = LOCAL / rel
    remote_path = f"{REMOTE_ROOT}/{rel}"
    local_hash = md5_local(local_path)
    _, out, _ = client.exec_command(f"md5sum {remote_path} 2>/dev/null | awk '{{print $1}}'")
    remote_hash = out.read().decode().strip()
    if local_hash == remote_hash:
        print(f"  [SYNC] {rel}")
    else:
        client.exec_command(f"test -f {remote_path} && cp {remote_path} {remote_path}.bak.$(date +%s)")[1].channel.recv_exit_status()
        sftp.put(str(local_path), remote_path)
        print(f"  [PUSH] {rel} (local={local_hash[:8]} was={remote_hash[:8] or 'MISSING'})")
        any_pushed = True
sftp.close()

if any_pushed:
    print("\nCache clear (files changed)...")
    _, out, _ = client.exec_command(f"cd {REMOTE_ROOT} && php artisan config:clear && php artisan route:clear && php artisan view:clear", timeout=60)
    print(out.read().decode())

print("=" * 60)
print("STAGE 2: REDIRECT CHAIN TEST (the 3 flagged URLs)")
print("=" * 60)
cmd = r'''
for u in "http://www.khaledahmed.net/" "http://khaledahmed.net/" "https://www.khaledahmed.net/"; do
  echo "--- $u ---"
  curl -sILv "$u" -o /dev/null 2>&1 | grep -iE "^[<>] (HTTP|location:)" | head -10
  echo
done
echo "--- destination (must be 200) ---"
curl -sI "https://khaledahmed.net/" | grep -iE "^HTTP" | head -1
'''
_, out, _ = client.exec_command(cmd, timeout=90)
print(out.read().decode())

print("=" * 60)
print("STAGE 3: /careers should be 410 + not in sitemap")
print("=" * 60)
cmd = '''
echo "/careers status:"
curl -sI "https://khaledahmed.net/careers" | grep -iE "^HTTP" | head -1
echo "/careers in sitemap (should be 0):"
curl -s "https://khaledahmed.net/sitemap.xml" | grep -c careers
echo "sitemap total URLs:"
curl -s "https://khaledahmed.net/sitemap.xml" | grep -c "<loc>"
'''
_, out, _ = client.exec_command(cmd, timeout=60)
print(out.read().decode())
client.close()
print("DONE")
