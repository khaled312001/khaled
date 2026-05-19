"""
Fetch screenshots for missing portfolio images and upload via SFTP.
Tries microlink (free, no-auth), falls back to a styled SVG placeholder.
"""
import paramiko, urllib.request, json, ssl, sys, io
from pathlib import Path

HOST = "145.79.20.56"
PORT = 65002
USER = "u405809647"
PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"

TARGETS = [
    {
        "url": "https://masaary.com",
        "filename": "masaary.svg",
        "title": "Masaary",
        "subtitle": "AI Career Skills Platform",
        "grad_from": "#8b5cf6",
        "grad_to":   "#1e1b4b",
    },
    {
        "url": "https://ogs-academy.com",
        "filename": "ogs-academy.svg",
        "title": "OGS Academy",
        "subtitle": "Certified Industrial Training",
        "grad_from": "#10b981",
        "grad_to":   "#064e3b",
    },
    {
        "url": "https://lotussharm.com",
        "filename": "lotus-sharm.svg",
        "title": "Lotus Sharm",
        "subtitle": "Sharm El-Sheikh Tourism Platform",
        "grad_from": "#0ea5e9",
        "grad_to":   "#0c4a6e",
    },
    {
        "url": "https://d3mnakdi.com",
        "filename": "daamny.svg",
        "title": "Da3many",
        "subtitle": "Arabic Aid & Grants Portal",
        "grad_from": "#f59e0b",
        "grad_to":   "#7c2d12",
    },
]

local_dir = Path(__file__).parent / "public" / "images" / "projects"
local_dir.mkdir(parents=True, exist_ok=True)

ctx = ssl.create_default_context()

def fetch_microlink_screenshot(target_url: str) -> bytes | None:
    """Try to fetch a real screenshot via microlink free tier."""
    try:
        api = (
            f"https://api.microlink.io/?url={urllib.request.quote(target_url, safe=':/')}"
            f"&screenshot=true&meta=false"
            f"&screenshot.viewport.width=1280&screenshot.viewport.height=2400"
            f"&screenshot.type=jpeg"
        )
        print(f"  microlink API -> {api[:120]}...")
        req = urllib.request.Request(api, headers={"User-Agent": "Mozilla/5.0"})
        resp = urllib.request.urlopen(req, context=ctx, timeout=90)
        data = json.loads(resp.read().decode())
        if data.get("status") != "success":
            print(f"  microlink status: {data.get('status')}")
            return None
        shot_url = data.get("data", {}).get("screenshot", {}).get("url")
        if not shot_url:
            print("  microlink: no screenshot.url in response")
            return None
        print(f"  fetching image: {shot_url}")
        img_resp = urllib.request.urlopen(shot_url, context=ctx, timeout=90)
        img_bytes = img_resp.read()
        print(f"  got {len(img_bytes):,} bytes")
        return img_bytes
    except Exception as e:
        print(f"  microlink failed: {e}")
        return None

def make_svg_placeholder(t: dict) -> bytes:
    """Generate a clean SVG placeholder. 1200x780 matches the portfolio card aspect ratio
    (~1.55:1) so object-fit:cover does NOT crop out the centered text."""
    svg = f"""<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 780" width="1200" height="780" preserveAspectRatio="xMidYMid slice">
  <defs>
    <linearGradient id="g" x1="0" y1="0" x2="1" y2="1">
      <stop offset="0%" stop-color="{t['grad_from']}"/>
      <stop offset="100%" stop-color="{t['grad_to']}"/>
    </linearGradient>
    <pattern id="dots" width="30" height="30" patternUnits="userSpaceOnUse">
      <circle cx="2" cy="2" r="1.3" fill="rgba(255,255,255,0.10)"/>
    </pattern>
    <radialGradient id="glow" cx="50%" cy="50%" r="60%">
      <stop offset="0%" stop-color="rgba(255,255,255,0.10)"/>
      <stop offset="100%" stop-color="rgba(255,255,255,0)"/>
    </radialGradient>
  </defs>
  <rect width="1200" height="780" fill="url(#g)"/>
  <rect width="1200" height="780" fill="url(#dots)"/>
  <rect width="1200" height="780" fill="url(#glow)"/>
  <g text-anchor="middle" font-family="-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif" fill="#ffffff">
    <text x="600" y="340" font-size="92" font-weight="800" letter-spacing="-2">{t['title']}</text>
    <text x="600" y="410" font-size="34" font-weight="500" opacity="0.88">{t['subtitle']}</text>
    <g transform="translate(600,490)">
      <rect x="-110" y="-22" width="220" height="44" rx="22" fill="rgba(255,255,255,0.14)" stroke="rgba(255,255,255,0.30)" stroke-width="1.5"/>
      <text y="8" font-size="18" font-weight="700" opacity="0.95" letter-spacing="3">VISIT LIVE SITE</text>
    </g>
  </g>
</svg>
"""
    return svg.encode("utf-8")

# Generate / fetch images locally first
results = []
for t in TARGETS:
    print(f"\n=== {t['filename']} ({t['url']}) ===")
    img = fetch_microlink_screenshot(t["url"])
    ext = "jpg"
    if not img:
        print("  Falling back to SVG placeholder")
        img = make_svg_placeholder(t)
        ext = "svg"
        # Save as .svg AND keep the .jpg name we'll need to update PortfolioService
    out_name = t["filename"]
    if ext == "svg":
        out_name = t["filename"].rsplit(".", 1)[0] + ".svg"
    out_path = local_dir / out_name
    out_path.write_bytes(img)
    print(f"  saved local: {out_path} ({len(img):,} bytes)")
    results.append((t["filename"], out_name, len(img)))

# Upload to server
print("\n=== Uploading to server ===")
client = paramiko.SSHClient()
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
client.connect(HOST, PORT, USER, PASSWORD, look_for_keys=False, allow_agent=False, timeout=30)
sftp = client.open_sftp()
for original_name, actual_name, size in results:
    local_path = local_dir / actual_name
    remote_path = f"{REMOTE_ROOT}/public/images/projects/{actual_name}"
    sftp.put(str(local_path), remote_path)
    print(f"  uploaded {actual_name} ({size:,} bytes)")
sftp.close()

# If we fell back to SVG, update PortfolioService image extension
need_php_update = any(actual.endswith(".svg") for _, actual, _ in results)
if need_php_update:
    print("\n=== Updating PortfolioService.php image extensions ===")
    cmd_parts = []
    for original_name, actual_name, _ in results:
        if actual_name.endswith(".svg"):
            cmd_parts.append(f"sed -i \"s|projects/{original_name}|projects/{actual_name}|g\" {REMOTE_ROOT}/app/Services/PortfolioService.php")
    if cmd_parts:
        cmd = " && ".join(cmd_parts) + f" && cd {REMOTE_ROOT} && php artisan view:clear && php artisan config:clear"
        _, out, err = client.exec_command(cmd, timeout=30)
        print(out.read().decode())
        e = err.read().decode()
        if e.strip(): print("STDERR:", e)

# Verify HTTP 200 for the new images
print("\n=== Verifying images load ===")
for original_name, actual_name, _ in results:
    url = f"https://khaledahmed.net/images/projects/{actual_name}"
    try:
        req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0"})
        r = urllib.request.urlopen(req, context=ctx, timeout=30)
        print(f"  {actual_name}: HTTP {r.status}, {r.headers.get('content-type')}, {r.headers.get('content-length')} bytes")
    except Exception as e:
        print(f"  {actual_name}: ERROR {e}")

client.close()
print("\nDone.")
