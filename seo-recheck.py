import paramiko
c = paramiko.SSHClient()
c.set_missing_host_key_policy(paramiko.AutoAddPolicy())
c.connect('145.79.20.56', 65002, 'u405809647', 'support@Passord123support@Passord123',
          look_for_keys=False, allow_agent=False, timeout=20)

cmd = r'''
echo "============================================"
echo "(1) https://www.khaledahmed.net/services (Jan 4 crawl - STALE?)"
echo "============================================"
curl -sI "https://www.khaledahmed.net/services" | grep -iE "^HTTP|^location" | head -2
echo
echo "============================================"
echo "(2) https://www.khaledahmed.net/Khaled_Ahmed.pdf (Jan 13 crawl - STALE?)"
echo "============================================"
curl -sI "https://www.khaledahmed.net/Khaled_Ahmed.pdf" | grep -iE "^HTTP|^location|x-robots" | head -3
echo
echo "============================================"
echo "(3) https://quran.khaledahmed.net/Quran.apk (separate subdomain)"
echo "============================================"
curl -sI "https://quran.khaledahmed.net/Quran.apk" | grep -iE "^HTTP|content-type|x-robots" | head -3
echo
echo "============================================"
echo "(4) https://khaledahmed.net/careers (NEW - May 26 crawl)"
echo "============================================"
curl -sI "https://khaledahmed.net/careers" | grep -iE "^HTTP" | head -1
echo "--- canonical ---"
curl -s "https://khaledahmed.net/careers" | grep -oiE '<link[^>]*rel="canonical"[^>]*>' | head -1
echo "--- title ---"
curl -s "https://khaledahmed.net/careers" | grep -oiE '<title>[^<]*</title>' | head -1
echo "--- meta description ---"
curl -s "https://khaledahmed.net/careers" | grep -oiE '<meta[^>]*name="description"[^>]*>' | head -1
echo "--- h1 ---"
curl -s "https://khaledahmed.net/careers" | grep -oiE '<h1[^>]*>[^<]*</h1>' | head -1
echo "--- word count of visible body ---"
curl -s "https://khaledahmed.net/careers" | sed -e 's/<[^>]*>//g' -e 's/[[:space:]]\+/ /g' | wc -w
echo
echo "--- is /careers in sitemap.xml? ---"
curl -s "https://khaledahmed.net/sitemap.xml" | grep -c "careers"
'''
_, out, _ = c.exec_command(cmd, timeout=90)
print(out.read().decode())
c.close()
