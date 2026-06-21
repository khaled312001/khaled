"""Extract English content + metadata for posts whose content_ar is just a placeholder."""
import re, json
from pathlib import Path

src = Path("f:/Certificates/khaled/app/Services/BlogService.php").read_text(encoding="utf-8")

# Capture each post: slug + (content_ar body) + (content body)
post_re = re.compile(
    r"'slug'\s*=>\s*'([^']+)'(.*?)'content_ar'\s*=>\s*<<<'HTML'\n(.*?)\nHTML,\s*"
    r"'content'\s*=>\s*<<<'HTML'\n(.*?)\nHTML",
    re.DOTALL
)

def field(block, key):
    m = re.search(rf"'{key}'\s*=>\s*'((?:[^'\\]|\\.)*)'", block)
    return m.group(1).encode().decode("unicode_escape") if m else ""

placeholders = []
for m in post_re.finditer(src):
    slug, header_block, ar_body, en_body = m.group(1), m.group(2), m.group(3), m.group(4)
    if "المقال الكامل متاح بالإنجليزي" not in ar_body:
        continue
    placeholders.append({
        "slug": slug,
        "title": field(header_block, "title"),
        "title_ar": field(header_block, "title_ar"),
        "category": field(header_block, "category"),
        "excerpt": field(header_block, "excerpt"),
        "excerpt_ar": field(header_block, "excerpt_ar"),
        "content_en": en_body,
    })

out = Path("f:/Certificates/khaled/posts-needing-arabic.json")
out.write_text(json.dumps(placeholders, ensure_ascii=False, indent=2), encoding="utf-8")
print(f"Extracted {len(placeholders)} posts to {out.name}")
for p in placeholders:
    en_words = len(re.sub(r"<[^>]+>", " ", p["content_en"]).split())
    print(f"  {p['slug']:45} | {en_words:>4} EN words | {p['category']}")
