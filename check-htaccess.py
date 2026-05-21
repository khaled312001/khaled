import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
ROOT=domains/khaledahmed.net/public_html
echo "=== which .htaccess files exist ==="
ls -la $ROOT/.htaccess 2>&1
ls -la $ROOT/public/.htaccess 2>&1
echo
echo "=== docroot detection: is index.php at public_html root or public/? ==="
ls -la $ROOT/index.php 2>&1 | head -1
ls -la $ROOT/public/index.php 2>&1 | head -1
echo
echo "=== FIRST 25 lines of public_html/.htaccess (the one that actually runs) ==="
head -25 $ROOT/.htaccess 2>&1
echo
echo "=== does public_html/.htaccess contain the www redirect? ==="
grep -n "khaledahmed" $ROOT/.htaccess 2>&1 | head -10
echo
echo "=== server software ==="
curl -sI "https://khaledahmed.net/" | grep -iE "^server|^HTTP" | head -3
'''
_, out, _ = c.exec_command(cmd, timeout=60)
print(out.read().decode())
c.close()
