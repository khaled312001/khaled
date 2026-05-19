"""Upload regenerated SVG placeholders + verify."""
import paramiko, time
from pathlib import Path

PASSWORD = "support@Passord123support@Passord123"

for attempt in range(3):
    try:
        client = paramiko.SSHClient()
        client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        client.connect('145.79.20.56', 65002, 'u405809647', PASSWORD,
                       look_for_keys=False, allow_agent=False,
                       timeout=30, banner_timeout=30, auth_timeout=30)
        sftp = client.open_sftp()
        print(f'Connected on attempt {attempt+1}')
        break
    except Exception as e:
        print(f'attempt {attempt+1} failed: {e}')
        if attempt < 2:
            time.sleep(30)
else:
    raise SystemExit('Could not connect')

files = ['masaary.svg', 'ogs-academy.svg', 'lotus-sharm.svg', 'daamny.svg']
local_dir = Path('f:/Certificates/khaled/public/images/projects')
remote_dir = 'domains/khaledahmed.net/public_html/public/images/projects'

for f in files:
    local = local_dir / f
    remote = f'{remote_dir}/{f}'
    sftp.put(str(local), remote)
    print(f'  uploaded {f} ({local.stat().st_size:,} bytes)')
sftp.close()

verify_cmd = f"""
chmod 644 {remote_dir}/*.svg
for f in masaary.svg ogs-academy.svg lotus-sharm.svg daamny.svg; do
  echo "--- $f ---"
  curl -sI "https://khaledahmed.net/images/projects/$f" | head -2
done
"""
_, out, _ = client.exec_command(verify_cmd)
print()
print(out.read().decode())
client.close()
