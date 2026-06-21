"""Audit word counts of every blog post (both EN and AR), output JSON for the next step."""
import re, json
from pathlib import Path

src = Path("f:/Certificates/khaled/app/Services/BlogService.php").read_text(encoding="utf-8")

# Match each post block
pattern = re.compile(
    r"'slug'\s*=>\s*'([^']+)'(.*?)"
    r"'content_ar'\s*=>\s*<<<'HTML'\n(.*?)\nHTML,\s*"
    r"'content'\s*=>\s*<<<'HTML'\n(.*?)\nHTML",
    re.DOTALL
)

def words(html):
    return len(re.sub(r"<[^>]+>", " ", html).split())

def field(block, key):
    m = re.search(rf"'{key}'\s*=>\s*'((?:[^'\\]|\\.)*)'", block)
    return m.group(1) if m else ""

posts = []
for m in pattern.finditer(src):
    slug, hdr, ar_body, en_body = m.group(1), m.group(2), m.group(3), m.group(4)
    posts.append({
        "slug": slug,
        "title": field(hdr, "title"),
        "category": field(hdr, "category"),
        "en_words": words(en_body),
        "ar_words": words(ar_body),
        "ar_is_placeholder": "المقال الكامل متاح بالإنجليزي" in ar_body,
        "content_en": en_body,
    })

print(f"Total posts: {len(posts)}\n")
print(f"{'Slug':<45} {'EN':>5} {'AR':>5}  {'AR-placeholder':<14} {'EN<2000':<10} Category")
print("-" * 100)
need_en_expand = []
for p in sorted(posts, key=lambda x: x['en_words']):
    flag_ar = "YES" if p["ar_is_placeholder"] else ""
    flag_en = "YES" if p["en_words"] < 2000 else ""
    if p["en_words"] < 2000:
        need_en_expand.append(p)
    print(f"{p['slug']:<45} {p['en_words']:>5} {p['ar_words']:>5}  {flag_ar:<14} {flag_en:<10} {p['category']}")

print(f"\n>> Posts needing EN expansion (<2000 words): {len(need_en_expand)}")

# Save full list for workflow input
out = Path("f:/Certificates/khaled/posts-need-expansion.json")
out.write_text(json.dumps(need_en_expand, ensure_ascii=False, indent=2), encoding="utf-8")
print(f"Saved expansion targets to {out.name}")
