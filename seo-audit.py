"""Audit the live SEO behavior of the URLs flagged in Google Search Console."""
import paramiko

c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
echo "========= www -> non-www redirect ========="
for u in "https://www.khaledahmed.net/" "https://www.khaledahmed.net/services" "https://www.khaledahmed.net/Khaled_Ahmed.pdf"; do
  echo "--- $u ---"
  curl -sI "$u" | grep -iE "^HTTP|^location" | head -3
done

echo
echo "========= ?tag= redirect (should be 301 -> /blogs) ========="
curl -sI "https://khaledahmed.net/blogs?tag=web+development" | grep -iE "^HTTP|^location" | head -3

echo
echo "========= canonical tag on key pages ========="
for u in "https://khaledahmed.net/plans" "https://khaledahmed.net/blog/website-security-checklist" "https://khaledahmed.net/blog/category/security"; do
  echo "--- $u ---"
  curl -s "$u" | grep -oiE '<link[^>]*rel="canonical"[^>]*>' | head -1
  curl -sI "$u" | grep -iE "^HTTP" | head -1
done

echo
echo "========= PDF X-Robots-Tag (should be noindex) ========="
curl -sI "https://khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|x-robots" | head -3

echo
echo "========= robots.txt ========="
curl -s "https://khaledahmed.net/robots.txt" | head -40
'''
_, out, _ = c.exec_command(cmd, timeout=60)
print(out.read().decode())
c.close()
