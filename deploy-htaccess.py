import paramiko, time, sys
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"
LOCAL = Path("f:/Certificates/khaled")

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

# Deploy root .htaccess
remote = f"{REMOTE_ROOT}/.htaccess"
client.exec_command(f"cp {remote} {remote}.bak.$(date +%s)")[1].channel.recv_exit_status()
sftp.put(str(LOCAL / ".htaccess"), remote)
print("  uploaded root .htaccess")
sftp.close()

verify = r'''
echo "=== www static PDF (expect 301 now) ==="
curl -sI "https://www.khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|^location" | head -2
echo
echo "=== non-www PDF stays 200 + noindex ==="
curl -sI "https://khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|x-robots" | head -2
echo
echo "=== www homepage still 301 ==="
curl -sI "https://www.khaledahmed.net/" | grep -iE "^HTTP|^location" | head -2
echo
echo "=== non-www homepage stays 200 (no loop) ==="
curl -sI "https://khaledahmed.net/" | grep -iE "^HTTP" | head -1
echo
echo "=== non-www static asset stays 200 (no loop) ==="
curl -sI "https://khaledahmed.net/images/logo.png" | grep -iE "^HTTP" | head -1
'''
_, out, _ = client.exec_command(verify, timeout=60)
print(out.read().decode())
client.close()
print("DONE")
