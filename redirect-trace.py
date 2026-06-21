"""Trace the full redirect chain for the GSC-flagged http URLs."""
import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
echo "=== FULL HEADERS FOR http://www.khaledahmed.net/ ==="
curl -IL "http://www.khaledahmed.net/" 2>&1 | grep -E "^HTTP|^[Ll]ocation|^[Ss]erver|^[Xx]-"
'''
_, out, _ = c.exec_command(cmd, timeout=120)
print(out.read().decode())
c.close()

