import re
import json

with open('F:/Certificates/khaled/article_5_data.json', 'r', encoding='utf-8') as f:
    data = json.load(f)

content_en = data['content']
content_ar = data['content_ar']

def strip_html(s):
    s = re.sub(r'<[^>]+>', ' ', s)
    s = re.sub(r'&[a-z]+;', ' ', s)
    s = re.sub(r'\s+', ' ', s)
    return s.strip()

def count_words(s):
    return len(s.split())

def count_internal_links(s):
    links = re.findall(r'href="([^"]+)"', s)
    count = 0
    for l in links:
        if l.startswith('/') or l.startswith('https://khaledahmed.net/'):
            count += 1
    return count

text_en = strip_html(content_en)
text_ar = strip_html(content_ar)

word_count_en = count_words(text_en)
word_count_ar = count_words(text_ar)
internal_en = count_internal_links(content_en)
internal_ar = count_internal_links(content_ar)

print(f"EN word count: {word_count_en}")
print(f"AR word count: {word_count_ar}")
print(f"EN internal links: {internal_en}")
print(f"AR internal links: {internal_ar}")
print(f"Total internal links: {internal_en + internal_ar}")

first_p_match = re.search(r'<p[^>]*>', content_en)
print(f"First p tag EN: {first_p_match.group() if first_p_match else 'None'}")
first_p_match_ar = re.search(r'<p[^>]*>', content_ar)
print(f"First p tag AR: {first_p_match_ar.group() if first_p_match_ar else 'None'}")

issues = []
for line in content_en.split('\n'):
    if line.strip() == 'HTML':
        issues.append("'HTML' on a line by itself in EN")
for line in content_ar.split('\n'):
    if line.strip() == 'HTML':
        issues.append("'HTML' on a line by itself in AR")

if '<script' in content_en.lower() or '<script' in content_ar.lower():
    issues.append("<script found")
if '<style' in content_en.lower() or '<style' in content_ar.lower():
    issues.append("<style found")
if re.search(r'\sstyle\s*=', content_en) or re.search(r'\sstyle\s*=', content_ar):
    issues.append("inline style attribute found")

title = data['title']
meta_title = data['meta_title']
print(f"Title: {title}")
print(f"Meta title: {meta_title}")
print(f"Title contains keyword: {('Next.js' in title and 'Switzerland' in title)}")
print(f"Meta title contains keyword: {('Next.js' in meta_title and 'Switzerland' in meta_title)}")

print(f"\nIssues: {issues}")
