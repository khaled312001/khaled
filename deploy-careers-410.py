import paramiko, time, sys
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"
LOCAL = Path("f:/Certificates/khaled")
FILES = ["routes/web.php", "app/Http/Controllers/PageController.php"]

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
    client.exec_command(f"cp {remote} {remote}.bak.$(date +%s)")[1].channel.recv_exit_status()
    sftp.put(str(local), remote)
    print(f"  uploaded {rel} ({local.stat().st_size:,} bytes)")
sftp.close()

verify = f"""
cd {REMOTE_ROOT}
php -l routes/web.php
php -l app/Http/Controllers/PageController.php
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo "=== /careers should now be 410 Gone ==="
curl -sI "https://khaledahmed.net/careers" | grep -iE "^HTTP" | head -1
echo "=== sitemap should NOT contain /careers ==="
curl -s "https://khaledahmed.net/sitemap.xml" | grep -c careers
echo "=== other pages still 200 (sanity) ==="
for u in "/" /services /portfolios /plans /about /contact /blogs; do
  code=$(curl -sI "https://khaledahmed.net$u" | grep -iE "^HTTP" | head -1 | awk '{{print $2}}')
  printf "  %-15s -> %s\\n" "$u" "$code"
done
"""
_, out, err = client.exec_command(verify, timeout=90)
print(out.read().decode())
e = err.read().decode()
if e.strip(): print("STDERR:", e)
client.close()
print("DONE")
