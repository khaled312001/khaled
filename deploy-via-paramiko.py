"""
Upload modified files to the server via SFTP, then clear caches and verify.
"""
import paramiko
import sys
from pathlib import Path

HOST = "145.79.20.56"
PORT = 65002
USER = "u405809647"
PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"

# Local-path -> server-relative-path
FILES = [
    ("app/Http/Controllers/PageController.php",          "app/Http/Controllers/PageController.php"),
    ("app/Services/PortfolioService.php",                "app/Services/PortfolioService.php"),
    ("resources/views/pages/portfolios.blade.php",       "resources/views/pages/portfolios.blade.php"),
    ("resources/views/partials/portfolio-card.blade.php", "resources/views/partials/portfolio-card.blade.php"),
]

local_root = Path(__file__).parent

client = paramiko.SSHClient()
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
print(f"Connecting to {USER}@{HOST}:{PORT} ...", flush=True)
client.connect(HOST, PORT, USER, PASSWORD, look_for_keys=False, allow_agent=False, timeout=30)
print("Connected.\n", flush=True)

# Get timestamp for backups
_, out, _ = client.exec_command("date +%s")
ts = out.read().decode().strip()
print(f"Server timestamp: {ts}\n")

# Backup + upload each file
sftp = client.open_sftp()
for local_rel, remote_rel in FILES:
    local_path = local_root / local_rel.replace("/", "\\")
    if not local_path.exists():
        # try forward-slash style
        local_path = local_root / local_rel
    remote_path = f"{REMOTE_ROOT}/{remote_rel}"
    print(f"--- {remote_rel} ---")

    # Ensure remote dir exists (mkdir -p)
    remote_dir = "/".join(remote_path.split("/")[:-1])
    client.exec_command(f"mkdir -p {remote_dir}")[1].channel.recv_exit_status()

    # Backup if remote file exists
    bk_cmd = f"test -f {remote_path} && cp {remote_path} {remote_path}.bak.{ts} && echo 'backed up' || echo 'new file, no backup'"
    _, out, _ = client.exec_command(bk_cmd)
    print(out.read().decode().strip())

    # Upload
    sftp.put(str(local_path), remote_path)
    size = local_path.stat().st_size
    print(f"uploaded ({size:,} bytes)\n")
sftp.close()

# Verify
verify = f"""
cd {REMOTE_ROOT}
echo "=== syntax check ==="
php -l app/Http/Controllers/PageController.php
php -l app/Services/PortfolioService.php
echo
echo "=== blade view caches cleared ==="
php artisan view:clear
php artisan route:clear
php artisan config:clear
echo
echo "=== /portfolios HTTP status ==="
curl -sI "https://khaledahmed.net/portfolios" | head -1
echo "=== look for new design markers on /portfolios ==="
curl -s "https://khaledahmed.net/portfolios" > /tmp/_p.html
echo "country-section count: $(grep -c 'country-section' /tmp/_p.html)"
echo "country-chip count:    $(grep -c 'country-chip' /tmp/_p.html)"
echo "data-counter count:    $(grep -c 'data-counter' /tmp/_p.html)"
echo "project-card count:    $(grep -c 'project-card' /tmp/_p.html)"
echo "marketing-agency present? $(grep -c 'marketing.khaledahmed.net' /tmp/_p.html)"
rm -f /tmp/_p.html
"""
print("--- running verification ---")
_, out, err = client.exec_command(verify, timeout=90)
print(out.read().decode("utf-8", errors="replace"))
err_text = err.read().decode("utf-8", errors="replace")
if err_text.strip():
    print("--- STDERR ---")
    print(err_text)
rc = out.channel.recv_exit_status()
print(f"--- exit code: {rc} ---")
client.close()
sys.exit(rc)
