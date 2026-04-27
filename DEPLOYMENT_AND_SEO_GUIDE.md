# دليل النشر و SEO Action Plan — khaledahmed.net

This document covers (1) how to deploy the new code to your Hostinger server, and (2) the exact Google Search Console actions that resolve the indexing issues you reported.

---

## 1. What changed in this update

### New SEO infrastructure
- **16 in-depth blog articles** (`/blog/{slug}`) — each ~1,500–2,500 words, written for senior-level keywords like "hire full stack developer", "Laravel vs Node.js", "website cost 2026", "SEO checklist". This is real, indexable content (the "Crawled — currently not indexed" warning was caused by lorem-ipsum placeholder content).
- **Rich FAQ page** with 30+ questions across 6 categories + `FAQPage` JSON-LD schema (Google rewards this with rich snippets).
- **Dynamic sitemap.xml** — 41 URLs now (was 8): all static pages + 16 blog posts + 14 category pages. Auto-updates when you add posts.
- **Dynamic robots.txt** — blocks PDFs from indexing (fixes the "Duplicate without canonical" warning for `/Khaled_Ahmed.pdf`).
- **Search redirect** — `/search?q=...` now 301-redirects to `/blogs?q=...` (fixes the 404 in Search Console).
- **`.htaccess`** — forces HTTPS, redirects `www → non-www`, sets browser caching, enables gzip, adds security headers, sets `X-Robots-Tag: noindex` on PDFs.
- **JSON-LD schema** per page: `Person`, `ProfessionalService`, `WebSite`, `Blog`, `BlogPosting`, `FAQPage`, `BreadcrumbList`, `ContactPage`, `Service` with `OfferCatalog`.
- **Removed broken `SearchAction`** from JSON-LD (was pointing to `/search?q=...` which 404'd → fixed).

### Conversion improvements
- Hero rewritten to target "Hire a Senior Full Stack Web Developer" (high-intent keyword).
- Stats bar (25+ projects, 7 countries, 5+ years, 24h response) — trust signals.
- 9-card services grid with feature bullets — answers "what do you build?" before they leave.
- Why-choose-me section + testimonials + final CTA.
- Every blog post ends with a contact CTA.
- Mobile sticky bottom bar (Call + WhatsApp) on phones.

### Mobile / performance
- Mobile-first CSS breakpoints in the layout (`max-width: 768px`).
- All `<img>` get `loading="lazy"`, `width`, `height` (prevents CLS).
- All `<script>` deferred (except jQuery).
- Cache-Control headers for static assets (1 year for images/fonts, 1 month for CSS/JS).

---

## 2. How to deploy to Hostinger

I prepared the files locally. Deploy them via **one of these three methods** — pick the one that fits your setup.

### Method A — `git pull` on the server (recommended)

If your Hostinger account is connected to this Git repo:

```bash
ssh -p 65002 u790947786@82.25.113.20
cd domains/khaledahmed.net/public_html   # or wherever your project lives
git pull origin main
php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan view:cache
php artisan route:cache
php artisan config:cache
exit
```

### Method B — FTP / File Manager upload

Upload these changed/new files via Hostinger's File Manager or FTP:

**New files:**
- `app/Services/BlogService.php`
- `resources/views/pages/blog-detail.blade.php`
- `public/.htaccess`
- `.htaccess` (root)

**Modified files:**
- `app/Http/Controllers/PageController.php`
- `routes/web.php`
- `resources/views/layouts/app.blade.php`
- `resources/views/partials/footer.blade.php`
- `resources/views/pages/home.blade.php`
- `resources/views/pages/blogs.blade.php`
- `resources/views/pages/faqs.blade.php`
- `resources/views/pages/contact.blade.php`
- `public/robots.txt`

**Delete:**
- `public/sitemap.xml` (the dynamic route now serves it)

Then SSH in once and run the cache-clearing commands from Method A.

### Method C — Re-upload everything

Upload the whole project folder, overwriting the old one. Skip `.env` (server keeps its own), `vendor/`, `node_modules/`, `storage/logs/`.

---

## 3. Post-deployment verification (do this immediately)

Visit each URL in a browser — all should return 200:

- `https://khaledahmed.net/` — new hero with stats
- `https://khaledahmed.net/blogs` — 16 article cards
- `https://khaledahmed.net/blog/laravel-vs-nodejs-2026` — full article
- `https://khaledahmed.net/blog/category/seo` — category page
- `https://khaledahmed.net/faqs` — accordion with 30+ questions
- `https://khaledahmed.net/sitemap.xml` — should show 41+ URLs
- `https://khaledahmed.net/robots.txt` — should block PDFs

Then check the redirects work:
- `http://khaledahmed.net/` → `https://khaledahmed.net/` (301)
- `http://www.khaledahmed.net/` → `https://khaledahmed.net/` (301)
- `https://www.khaledahmed.net/` → `https://khaledahmed.net/` (301)
- `https://khaledahmed.net/search?q=foo` → `https://khaledahmed.net/blogs?q=foo` (301)

You can verify any redirect with curl:
```bash
curl -I https://www.khaledahmed.net/
```
Look for `HTTP/1.1 301 Moved Permanently` and the new `Location:` header.

---

## 4. Google Search Console action plan

Now fix each issue from your screenshot. **Do these in order, all in one sitting** (~10 minutes total).

### 4.1. Submit the new sitemap
1. Open Search Console → **Sitemaps** (left sidebar).
2. Remove the old `sitemap.xml` entry if it's there (click ⋮ → Remove).
3. Type `sitemap.xml` and click **Submit**.
4. Status should turn green within an hour.

### 4.2. Fix "Crawled — currently not indexed" (`/faqs`, `/blogs`)
**Root cause:** thin / placeholder content. **Fixed by:** the new rich content I added.

1. Go to **Pages** → click the "Crawled — currently not indexed" row.
2. Click on `https://khaledahmed.net/faqs` → **Inspect URL** → **Request indexing**.
3. Repeat for `https://khaledahmed.net/blogs`.
4. Repeat for at least 5 of the new blog posts (the most important ones):
   - `/blog/hire-full-stack-web-developer-egypt`
   - `/blog/laravel-vs-nodejs-2026`
   - `/blog/how-much-does-website-cost-2026`
   - `/blog/website-seo-checklist-2026`
   - `/blog/react-vs-vue-2026`

### 4.3. Fix "Duplicate without user-selected canonical" (`/Khaled_Ahmed.pdf`)
**Root cause:** PDF was indexed alongside the page. **Fixed by:** robots.txt block + `X-Robots-Tag: noindex` in `.htaccess`.

1. The new `.htaccess` adds `X-Robots-Tag: noindex` to all `.pdf` responses.
2. The new `robots.txt` adds `Disallow: /*.pdf$`.
3. In Search Console → **Removals** → **New request** → temporarily remove `https://khaledahmed.net/Khaled_Ahmed.pdf` for 6 months while Google honors the new headers.

### 4.4. Fix "Not found (404)" (`/search?q={search_term_string}`)
**Root cause:** the WebSite JSON-LD declared a `SearchAction` pointing to a search URL that didn't exist. **Fixed by:** I removed that broken `SearchAction` from the layout's JSON-LD AND added a `/search` route that 301-redirects to `/blogs`.

1. After deploying, click the URL in Search Console → **Validate fix**.

### 4.5. Fix "Page with redirect" (`http://...` URLs)
**Root cause:** http requests being redirected to https. This is **expected and correct behavior** — Google just notes it. The new `.htaccess` makes the redirects 301 (permanent) which is what Google wants.

1. Click → **Validate fix** (should pass).

### 4.6. Fix "Alternate page with proper canonical tag"
**Root cause:** Google found `www.khaledahmed.net` versions and your canonical points to the non-www version. This is **working correctly** — Google is just confirming. The new `.htaccess` 301-redirects www to non-www so future crawls won't even hit the duplicate.

1. Click → **Validate fix** (should pass).

### 4.7. Submit a re-crawl request
After all the above, go to **Settings → Crawl stats** and verify Googlebot is hitting your site. Then in **URL inspection**, manually request indexing for your homepage. Within 1–7 days you should see the issues drop to zero.

---

## 5. Ranking strategy — getting to page 1 for "web developer" keywords

The new blog articles are written to rank for these high-intent searches. Expected timeline: **3–6 months for initial rankings, 6–12 months for page-1 positions** (assuming no manual penalties).

### Primary target keywords (each with a dedicated article):

| Keyword | Article | Search Intent |
|---|---|---|
| hire full stack developer Egypt | `/blog/hire-full-stack-web-developer-egypt` | Buyer |
| laravel vs nodejs | `/blog/laravel-vs-nodejs-2026` | Decision |
| react vs vue 2026 | `/blog/react-vs-vue-2026` | Decision |
| how much does a website cost | `/blog/how-much-does-website-cost-2026` | Pricing research |
| website seo checklist | `/blog/website-seo-checklist-2026` | DIY |
| why is my website slow | `/blog/why-your-website-loads-slowly` | Problem |
| mobile first web design | `/blog/mobile-first-web-design-2026` | Education |
| ecommerce website cost | `/blog/ecommerce-website-development-guide` | Buyer |
| wordpress vs laravel | `/blog/wordpress-vs-laravel-which-to-choose` | Decision |
| are PWAs worth it | `/blog/progressive-web-apps-2026` | Education |
| web development trends 2026 | `/blog/web-development-trends-2026` | Trend |
| website security checklist | `/blog/website-security-checklist` | DIY |
| database design web apps | `/blog/database-design-for-web-apps` | Education |
| freelance vs agency developer | `/blog/freelance-developer-vs-agency` | Decision |
| api design best practices | `/blog/api-design-best-practices-2026` | Education |
| best web hosting 2026 | `/blog/choosing-web-hosting-2026` | Decision |

### What to do next (this week)

1. **Submit the sitemap** (5 min).
2. **Request indexing** for all 16 blog posts manually in Search Console — speeds up first crawl by weeks (15 min total).
3. **Add a blog post per week** going forward — fresh content compounds ranking signals. I structured the `BlogService.php` so adding a post is just adding one entry to the `posts()` array.
4. **Get backlinks** — reach out to 5 blogs/forums per month asking to guest-post or comment with a relevant link. This is the #1 thing that moves rankings.
5. **Google Business Profile** — claim and complete your GBP for "Web Developer in Cairo" if you do not have one. Strong local SEO signal.

### Tracking what works
- **Search Console** → Performance → filter by query "web developer", "hire developer", "laravel" weekly.
- **Lighthouse** → run on your homepage monthly. Target 95+ on Performance, 100 on SEO and Accessibility.
- **PageSpeed Insights** → Core Web Vitals must stay green.

---

## 6. Adding new blog posts (3-minute process)

1. Open `app/Services/BlogService.php`.
2. Inside the `posts()` array, add a new entry copying the structure of an existing one.
3. Set a unique `slug`, `title`, `excerpt`, `category`, `tags`, `image`, `date`, `read_time`, `meta_title`, `meta_description`, and HTML `content`.
4. Deploy. The post automatically:
   - Appears in `/blogs` index
   - Gets a detail page at `/blog/{slug}`
   - Joins the sitemap
   - Renders Article JSON-LD for Google
   - Is reachable from category pages

---

## 7. Optional next-level wins (if you want to keep climbing)

1. **Self-host fonts** instead of Google Fonts — eliminates a render-blocking request.
2. **Convert hero / portfolio images to WebP** — typically 60% smaller than JPEG.
3. **Add Schema for `Review` / `AggregateRating`** once you have 5+ written client reviews — drives star ratings in search results.
4. **Add an Arabic version** at `/ar/...` with proper `hreflang` tags — opens Arabic search market (low competition for technical Arabic content).
5. **Set up Google Analytics 4** + Microsoft Clarity (free) — see what users actually do.
6. **Add UTM tracking** to your CV download and contact buttons so you know which channel converts.

---

If anything breaks after deploy, the most common cause is a stale Laravel cache. Run on the server:

```bash
php artisan view:clear && php artisan config:clear && php artisan route:clear
```

Then re-cache for production:

```bash
php artisan view:cache && php artisan config:cache && php artisan route:cache
```

Good luck. The work is in — now it is time and consistency that move rankings.
