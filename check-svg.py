import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=15)

cmd = r'''
cd domains/khaledahmed.net/public_html/public/images/projects
for f in masaary.svg ogs-academy.svg lotus-sharm.svg daamny.svg; do
  echo "=== $f ==="
  ls -la "$f"
  echo "--- on disk (first 400 chars) ---"
  head -c 400 "$f"
  echo
  echo "--- via curl (first 400 chars) ---"
  curl -s "https://khaledahmed.net/images/projects/$f" | head -c 400
  echo
  echo
done
'''
_, out, _ = c.exec_command(cmd)
print(out.read().decode())
c.close()
