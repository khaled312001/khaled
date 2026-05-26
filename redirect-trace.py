"""Trace the full redirect chain for the GSC-flagged http URLs."""
import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
for u in "http://www.khaledahmed.net/" "http://khaledahmed.net/" "https://www.khaledahmed.net/" "https://khaledahmed.net/"; do
  echo "============================================"
  echo "ORIGIN: $u"
  echo "============================================"
  # -I HEAD with -L follow + show ALL response headers including each hop
  curl -sILv "$u" -o /dev/null 2>&1 | grep -iE "^[<>] (HTTP|location)" | head -20
  echo
done
'''
_, out, _ = c.exec_command(cmd, timeout=120)
print(out.read().decode())
c.close()
