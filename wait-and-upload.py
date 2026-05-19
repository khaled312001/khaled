"""Poll SSH until it recovers, then upload the 4 SVG placeholders and verify."""
import paramiko, time, sys
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"
LOCAL_DIR = Path("f:/Certificates/khaled/public/images/projects")
REMOTE_DIR = "domains/khaledahmed.net/public_html/public/images/projects"
FILES = ["masaary.svg", "ogs-academy.svg", "lotus-sharm.svg", "daamny.svg"]
MAX_WAIT_MIN = 30
POLL_INTERVAL = 60

def try_connect():
    c = paramiko.SSHClient()
    c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
    c.connect("145.79.20.56", 65002, "u405809647", PASSWORD,
              look_for_keys=False, allow_agent=False,
              timeout=15, banner_timeout=15, auth_timeout=15)
    s = c.open_sftp()
    return c, s

deadline = time.time() + MAX_WAIT_MIN * 60
attempt = 0
client = sftp = None
while time.time() < deadline:
    attempt += 1
    try:
        client, sftp = try_connect()
        print(f"[attempt {attempt}] connected", flush=True)
        break
    except Exception as e:
        print(f"[attempt {attempt}] not ready ({type(e).__name__}); sleeping {POLL_INTERVAL}s", flush=True)
        time.sleep(POLL_INTERVAL)

if not client:
    print("FAILED: SSH did not recover within 30 minutes")
    sys.exit(1)

# Upload
for f in FILES:
    local = LOCAL_DIR / f
    remote = f"{REMOTE_DIR}/{f}"
    sftp.put(str(local), remote)
    print(f"uploaded {f} ({local.stat().st_size:,} bytes)", flush=True)
sftp.close()

# Permissions + verify HTTP status from inside the server
verify = f"""
chmod 644 {REMOTE_DIR}/*.svg
for f in masaary.svg ogs-academy.svg lotus-sharm.svg daamny.svg; do
  echo "$f $(curl -sI https://khaledahmed.net/images/projects/$f | head -1 | tr -d '\\r')"
done
"""
_, out, _ = client.exec_command(verify)
print()
print(out.read().decode())
client.close()
print("DONE", flush=True)
