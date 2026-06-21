"""Full live audit: fetch every page, inspect background/text colors, button positions, visibility."""
import urllib.request, ssl, re
ctx = ssl.create_default_context()

PAGES = ['/', '/about', '/services', '/portfolios', '/blogs',
         '/blog/build-saas-mvp-laravel-react-2026', '/contact', '/faqs']

def fetch(path, locale='ar'):
    req = urllib.request.Request(
        'https://khaledahmed.net' + path,
        headers={'User-Agent': 'Mozilla/5.0', 'Cookie': f'site_locale={locale}'}
    )
    return urllib.request.urlopen(req, context=ctx, timeout=30).read().decode('utf-8', 'replace')

issues = []

print("=" * 80)
print("STAGE 1: VERIFY DEPLOYED FIXES ARE LIVE")
print("=" * 80)
home = fetch('/')
checks = [
    ('nav-bar class', 'nav-bar"' in home),
    ('nav-brand-mark', 'nav-brand-mark' in home),
    ('dark-mode-global', 'dark-mode-global' in home),
    ('nav-and-fab', 'nav-and-fab' in home),
    ('h-hero class (new home)', 'class="h-hero"' in home),
    ('h-service class (new home)', 'class="h-service"' in home),
    ('khaled-hero.png removed', 'khaled-hero' not in home),
    ('floating-whatsapp tag', 'floating-whatsapp' in home),
    ('scroll-top forced right', '.scroll-top-btn,\n        html[dir="rtl"] .scroll-top-btn' in home),
]
for name, ok in checks:
    print(f"  {'OK ' if ok else 'NO '} {name}")

print()
print("=" * 80)
print("STAGE 2: AUDIT EACH PAGE FOR VISIBILITY/COLOR/STRUCTURE ISSUES")
print("=" * 80)

for path in PAGES:
    print(f"\n--- {path} ---")
    try:
        body = fetch(path)
    except Exception as e:
        print(f"  ERROR fetching: {e}")
        continue

    # Body length
    print(f"  body size: {len(body):,} chars")

    # Check title is set
    m = re.search(r'<title>(.*?)</title>', body, re.DOTALL)
    if m: print(f"  title: {m.group(1)[:80]}")

    # Light-mode color leaks (hardcoded white/light backgrounds that fight dark mode)
    light_bgs = [
        ('background:#fff', 'hardcoded #fff background (light leak)'),
        ('background: #fff', 'hardcoded #fff background (light leak)'),
        ('background:#f8fafc', 'hardcoded #f8fafc background (light leak)'),
        ('background: #f8fafc', 'hardcoded #f8fafc background (light leak)'),
        ('background:#f1f5f9', 'hardcoded #f1f5f9 background (light leak)'),
        ('background: #f1f5f9', 'hardcoded #f1f5f9 background (light leak)'),
    ]
    leaks = sum(body.count(s) for s, _ in light_bgs)
    if leaks > 5:
        print(f"  WARN  {leaks} hardcoded light background occurrences")
        issues.append((path, f'{leaks} light bg leaks'))

    # Hardcoded dark text colors (likely invisible on dark bg)
    dark_text_inline = [
        ('color:#0f172a', 'dark text color #0f172a (slate-900)'),
        ('color: #0f172a', 'dark text color #0f172a'),
        ('color:#1e293b', 'dark text color #1e293b'),
        ('color: #1e293b', 'dark text color #1e293b'),
    ]
    dark_leaks = sum(body.count(s) for s, _ in dark_text_inline)
    if dark_leaks > 3:
        print(f"  WARN  {dark_leaks} hardcoded dark text occurrences (likely invisible on dark bg)")
        issues.append((path, f'{dark_leaks} dark text leaks'))

    # Look for visible H1
    m = re.search(r'<h1[^>]*>(.*?)</h1>', body, re.DOTALL)
    if m: print(f"  h1: {re.sub(r'<[^>]+>', ' ', m.group(1)).strip()[:100]}")

    # Section count
    sections = len(re.findall(r'<section\b', body))
    print(f"  <section> count: {sections}")

    # Look for known broken patterns
    if 'class="footer"' in body and 'background:transparent' not in body[body.find('class="footer"'):body.find('class="footer"')+200]:
        pass  # ignore

    # Country strip detection (the user complained about it on portfolios)
    if 'country-' in body or 'flag-' in body or 'fi-' in body:
        # Count of flags
        flag_count = len(re.findall(r'fi\s+fi-[a-z]{2}', body))
        if flag_count > 0:
            print(f"  flags found: {flag_count}")

# Summary
print()
print("=" * 80)
print(f"SUMMARY: {len(issues)} pages with potential issues")
for path, issue in issues:
    print(f"  {path}: {issue}")
