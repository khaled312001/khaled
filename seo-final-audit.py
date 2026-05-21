import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
echo "=== www PDF (expect 301 -> non-www) ==="
curl -sI "https://www.khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|^location" | head -2

echo
echo "=== non-www PDF (expect 200 + x-robots noindex) ==="
curl -sI "https://khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|x-robots" | head -2

echo
echo "=== APK on quran subdomain (separate site) ==="
curl -sI "https://quran.khaledahmed.net/Quran.apk" | grep -iE "^HTTP|x-robots|content-type" | head -3
echo "--- quran subdomain robots.txt ---"
curl -s "https://quran.khaledahmed.net/robots.txt" 2>&1 | head -8

echo
echo "=== Blog posts/categories: HTTP + canonical (the 'crawled not indexed' set) ==="
for u in "https://khaledahmed.net/blog/react-vs-vue-2026" "https://khaledahmed.net/blog/laravel-vs-nodejs-2026" "https://khaledahmed.net/blog/category/trends" "https://khaledahmed.net/blog/category/backend"; do
  echo "--- $u ---"
  code=$(curl -sI "$u" | grep -iE "^HTTP" | head -1 | tr -d '\r')
  canon=$(curl -s "$u" | grep -oiE '<link[^>]*rel="canonical"[^>]*href="[^"]*"' | head -1)
  echo "$code | $canon"
done

echo
echo "=== Are these in sitemap.xml? ==="
curl -s "https://khaledahmed.net/sitemap.xml" | grep -oE '<loc>[^<]*</loc>' | grep -E "react-vs-vue|laravel-vs-nodejs|category/(trends|backend|security)|/plans" | head -10
echo "total sitemap urls:"
curl -s "https://khaledahmed.net/sitemap.xml" | grep -c "<loc>"
'''
_, out, _ = c.exec_command(cmd, timeout=90)
print(out.read().decode())
c.close()
