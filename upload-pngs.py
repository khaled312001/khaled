"""Upload the 4 real PNG screenshots + updated PortfolioService.php, then clear caches and verify."""
import paramiko, time, sys
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"
LOCAL = Path("f:/Certificates/khaled")

PNGS = ["masaary.png", "ogs-academy.png", "lotus-sharm.png", "daamny.png"]

for attempt in range(3):
    try:
        client = paramiko.SSHClient()
        client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        client.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
                       look_for_keys=False, allow_agent=False,
                       timeout=20, banner_timeout=20, auth_timeout=20)
        sftp = client.open_sftp()
        print(f"connected on attempt {attempt+1}")
        break
    except Exception as e:
        print(f"attempt {attempt+1} failed: {e}")
        if attempt < 2:
            time.sleep(30)
else:
    sys.exit("Could not connect")

# Upload PNGs
for f in PNGS:
    local = LOCAL / "public" / "images" / "projects" / f
    remote = f"{REMOTE_ROOT}/public/images/projects/{f}"
    sftp.put(str(local), remote)
    print(f"  png uploaded: {f} ({local.stat().st_size:,} bytes)")

# Upload PortfolioService.php
local_php = LOCAL / "app" / "Services" / "PortfolioService.php"
remote_php = f"{REMOTE_ROOT}/app/Services/PortfolioService.php"
# Backup first
client.exec_command(f"cp {remote_php} {remote_php}.bak.$(date +%s)")[1].channel.recv_exit_status()
sftp.put(str(local_php), remote_php)
print(f"  php uploaded: PortfolioService.php ({local_php.stat().st_size:,} bytes)")
sftp.close()

# Clear caches + verify
verify = f"""
cd {REMOTE_ROOT}
chmod 644 public/images/projects/*.png
php -l app/Services/PortfolioService.php
php artisan view:clear
php artisan route:clear
php artisan config:clear
echo "--- live image status ---"
for f in masaary.png ogs-academy.png lotus-sharm.png daamny.png; do
  size=$(stat -c %s public/images/projects/$f 2>/dev/null)
  http=$(curl -sI "https://khaledahmed.net/images/projects/$f" | head -1 | tr -d '\\r')
  echo "$f  ($size bytes)  $http"
done
echo "--- /portfolios references ---"
curl -s "https://khaledahmed.net/portfolios" | grep -oE 'projects/(masaary|ogs-academy|lotus-sharm|daamny)\\.(png|svg)' | sort | uniq -c
"""
_, out, _ = client.exec_command(verify, timeout=60)
print()
print(out.read().decode())
client.close()
print("DONE")
