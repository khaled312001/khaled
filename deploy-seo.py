"""Deploy the canonical-domain middleware + TrustProxies + Kernel, then test www redirect."""
import paramiko, time, sys
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"
LOCAL = Path("f:/Certificates/khaled")

FILES = [
    "app/Http/Middleware/ForceCanonicalDomain.php",
    "app/Http/Middleware/TrustProxies.php",
    "app/Http/Kernel.php",
]

for attempt in range(3):
    try:
        client = paramiko.SSHClient()
        client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        client.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
                       look_for_keys=False, allow_agent=False, timeout=20)
        sftp = client.open_sftp()
        print(f"connected on attempt {attempt+1}")
        break
    except Exception as e:
        print(f"attempt {attempt+1} failed: {e}")
        if attempt < 2: time.sleep(30)
else:
    sys.exit("Could not connect")

for rel in FILES:
    local = LOCAL / rel
    remote = f"{REMOTE_ROOT}/{rel}"
    # backup
    client.exec_command(f"test -f {remote} && cp {remote} {remote}.bak.$(date +%s)")[1].channel.recv_exit_status()
    sftp.put(str(local), remote)
    print(f"  uploaded {rel} ({local.stat().st_size:,} bytes)")
sftp.close()

verify = f"""
cd {REMOTE_ROOT}
echo "=== syntax ==="
php -l app/Http/Middleware/ForceCanonicalDomain.php
php -l app/Http/Middleware/TrustProxies.php
php -l app/Http/Kernel.php
echo "=== clear caches ==="
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear 2>/dev/null || true
echo
echo "=== TEST www -> non-www (expect 301 + location) ==="
for u in "https://www.khaledahmed.net/" "https://www.khaledahmed.net/services" "https://www.khaledahmed.net/blogs"; do
  echo "--- $u ---"
  curl -sI "$u" | grep -iE "^HTTP|^location" | head -2
done
echo
echo "=== non-www should stay 200 ==="
curl -sI "https://khaledahmed.net/" | grep -iE "^HTTP" | head -1
curl -sI "https://khaledahmed.net/services" | grep -iE "^HTTP" | head -1
"""
_, out, _ = client.exec_command(verify, timeout=90)
print(out.read().decode())
client.close()
print("DONE")
