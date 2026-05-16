"""
One-shot deploy: SSH to Hostinger and run the portfolio-update script.
"""
import paramiko
import sys
from pathlib import Path

HOST = "145.79.20.56"
PORT = 65002
USER = "u405809647"
PASSWORD = "support@Passord123support@Passord123"

script_path = Path(__file__).parent / "deploy-portfolio.sh"
script = script_path.read_text(encoding="utf-8")

client = paramiko.SSHClient()
client.set_missing_host_key_policy(paramiko.AutoAddPolicy())

print(f"Connecting to {USER}@{HOST}:{PORT} ...", flush=True)
client.connect(
    hostname=HOST,
    port=PORT,
    username=USER,
    password=PASSWORD,
    look_for_keys=False,
    allow_agent=False,
    timeout=30,
)
print("Connected. Executing deploy script...\n", flush=True)

stdin, stdout, stderr = client.exec_command(f"bash -s", timeout=120)
stdin.write(script)
stdin.channel.shutdown_write()

out = stdout.read().decode("utf-8", errors="replace")
err = stderr.read().decode("utf-8", errors="replace")
rc = stdout.channel.recv_exit_status()

print("--- STDOUT ---")
print(out)
if err.strip():
    print("--- STDERR ---")
    print(err)
print(f"--- exit code: {rc} ---")
client.close()
sys.exit(rc)
