"""Check which portfolio images exist on the server vs what's referenced."""
import paramiko, sys, re
from pathlib import Path

HOST = "145.79.20.56"
PORT = 65002
USER = "u405809647"
PASSWORD = "support@Passord123support@Passord123"
REMOTE_ROOT = "domains/khaledahmed.net/public_html"

client = paramiko.SSHClient()
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())
client.connect(HOST, PORT, USER, PASSWORD, look_for_keys=False, allow_agent=False, timeout=30)

# Get existing image filenames
cmd = f"ls -1 {REMOTE_ROOT}/public/images/projects/ 2>/dev/null"
_, out, _ = client.exec_command(cmd)
existing = set(out.read().decode().strip().split("\n"))
print(f"Files in public/images/projects/: {len(existing)}")
for f in sorted(existing):
    print(f"  - {f}")

# Read PortfolioService.php to find referenced images
cmd = f"grep -oE \"'image' => 'projects/[^']+'\" {REMOTE_ROOT}/app/Services/PortfolioService.php"
_, out, _ = client.exec_command(cmd)
refs = re.findall(r"projects/([^']+)", out.read().decode())
print(f"\nReferenced in PortfolioService.php: {len(refs)}")

# Missing
print("\n=== MISSING IMAGES ===")
missing = []
for r in refs:
    if r not in existing:
        missing.append(r)
        print(f"  MISSING: projects/{r}")
if not missing:
    print("  (none)")

# Get image dimensions for first few existing files (to detect aspect issues)
print("\n=== Image dimensions (first 8) ===")
for f in sorted(existing)[:8]:
    cmd = f"identify {REMOTE_ROOT}/public/images/projects/{f} 2>/dev/null | head -1"
    _, out, _ = client.exec_command(cmd)
    print(out.read().decode().strip() or f"  {f}: (identify unavailable)")

client.close()
sys.exit(0)
