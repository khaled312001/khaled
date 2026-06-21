import re
import json

article = {
    "content": "",
    "content_ar": ""
}

# Load from the JSON provided in the task - reading from a stored file would be best
# But we can hardcode by reading the file
with open(r"F:\Certificates\khaled\verify_article6_data.json", "r", encoding="utf-8") as f:
    article = json.load(f)

content_en = article["content"]
content_ar = article["content_ar"]

def strip_html(html):
    # Remove code/pre blocks but keep counting - actually we want to count text
    text = re.sub(r'<[^>]+>', ' ', html)
    text = re.sub(r'\s+', ' ', text).strip()
    return text

def count_words(text):
    return len(text.split())

en_text = strip_html(content_en)
ar_text = strip_html(content_ar)
en_wc = count_words(en_text)
ar_wc = count_words(ar_text)

def count_internal(html):
    links = re.findall(r'href="([^"]+)"', html)
    count = 0
    for l in links:
        if l.startswith('/') or l.startswith('https://khaledahmed.net/'):
            count += 1
    return count, links

en_links, en_link_list = count_internal(content_en)
ar_links, ar_link_list = count_internal(content_ar)

print(f"EN word count: {en_wc}")
print(f"AR word count: {ar_wc}")
print(f"EN internal links: {en_links}")
print(f"AR internal links: {ar_links}")
print(f"Total internal links: {en_links + ar_links}")
print()

first_p_en = re.search(r'<p[^>]*>', content_en)
print(f"First p tag EN: {first_p_en.group() if first_p_en else None}")
first_p_ar = re.search(r'<p[^>]*>', content_ar)
print(f"First p tag AR: {first_p_ar.group() if first_p_ar else None}")
print()

if re.search(r'(?m)^HTML$', content_en) or re.search(r'(?m)^HTML$', content_ar):
    print("WARN: HTML on line by itself")
else:
    print("OK: No HTML on line by itself")

for chk in ['<script', '<style', 'style=']:
    if chk in content_en or chk in content_ar:
        print(f"WARN: found '{chk}'")
    else:
        print(f"OK: no '{chk}'")

# Title checks
title = "Restaurant Website Development: Online Ordering, Reservations, and Menus That Convert in 2026"
meta_title = "Restaurant Website Development Guide 2026: Ordering and POS"
print()
print(f"Title contains 'Restaurant Website': {'Restaurant Website' in title}")
print(f"Meta title contains 'Restaurant Website Development': {'Restaurant Website Development' in meta_title}")
