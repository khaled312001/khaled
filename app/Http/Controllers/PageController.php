<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Services\BlogService;
use App\Services\CategoryHubService;
use App\Services\PortfolioService;
use App\Services\ScreenshotService;
use App\Services\LandingService;
use Illuminate\Support\Facades\Log;
use Exception;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    /**
     * High-intent SEO landing pages (hire-laravel-developer, saas-development, ...).
     * Content lives in LandingService; related projects pulled from the portfolio.
     */
    public function landing($slug)
    {
        $page = LandingService::find($slug);
        if (!$page) {
            abort(404);
        }
        // Pull up to 3 related portfolio projects in the same category.
        $cat = $page['related_category'] ?? null;
        $related = [];
        if ($cat) {
            $all = PortfolioService::all();
            $related = array_values(array_filter($all, fn($p) => ($p['category'] ?? '') === $cat));
            $related = array_slice($related, 0, 3);
        }
        return view('pages.landing', compact('page', 'related'));
    }

    public function blogs(Request $request)
    {
        // Legacy /blogs?tag=... URLs (linked from old blog-detail markup) duplicated
        // /blogs in Google's index — consolidate to the canonical with a 301.
        if ($request->query('tag') !== null) {
            return redirect()->route('blogs', [], 301);
        }

        $posts = BlogService::all();
        $categories = BlogService::categories();
        $tags = BlogService::tags();
        return view('pages.blogs', compact('posts', 'categories', 'tags'));
    }

    public function blogShow($slug)
    {
        $post = BlogService::find($slug);
        if (!$post) {
            abort(404);
        }
        $related = BlogService::related($slug, 3);
        return view('pages.blog-detail', compact('post', 'related'));
    }

    public function blogCategory($category)
    {
        // $category is a stable English slug like "backend", "platforms", "hiring".
        $categorySlug = strtolower($category);

        // Categories were consolidated (15 near-empty archives -> 5 real ones). Retired
        // slugs 301 to their new home so a previously crawled archive URL never 404s.
        if ($newSlug = BlogService::resolveLegacyCategory($categorySlug)) {
            return redirect()->route('blog.category', ['category' => $newSlug], 301);
        }

        $posts = BlogService::byCategorySlug($categorySlug);
        if (empty($posts)) {
            abort(404);
        }
        $categories = BlogService::categories();
        $tags = BlogService::tags();
        $categoryMeta = BlogService::categoryMeta($categorySlug);
        // An archive with only a post or two is thin by definition — let Google follow
        // the links out of it but keep it out of the index until it earns its place.
        $noindex = count($posts) < BlogService::MIN_INDEXABLE_CATEGORY_POSTS;
        return view('pages.blogs', compact(
            'posts', 'categories', 'tags', 'category', 'categorySlug', 'categoryMeta', 'noindex'
        ));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactSubmit(Request $request)
    {
        // Honeypot first — silently succeed so bots stop retrying
        if ($request->filled('website')) {
            return redirect()->route('contact')->with('success', 'Thank you! Your message was received.');
        }

        // Relaxed validation — only require the essentials so users do not get
        // locked out by overly strict rules (the previous min:10 rejection caused
        // user complaints). All other fields are optional metadata.
        $validated = $request->validate([
            'name'         => 'required|string|min:2|max:120',
            'email'        => 'required|email|max:190',
            'subject'      => 'required|string|min:2|max:200',
            'message'      => 'required|string|min:2|max:8000',
            'phone'        => 'nullable|string|max:40',
            'company'      => 'nullable|string|max:120',
            'project_type' => 'nullable|string|max:80',
            'budget'       => 'nullable|string|max:60',
            'timeline'     => 'nullable|string|max:60',
            'source'       => 'nullable|string|max:60',
            'nda_required' => 'nullable',
        ], [
            'email.email' => 'Please enter a valid email address.',
        ]);

        try {
            $clean = static fn ($v) => trim(preg_replace('/[\r\n<>"\(\)\[\]]/u', '', (string) $v));

            $details = [
                'name'         => $clean($validated['name']),
                'email'        => $validated['email'],
                'subject'      => $clean($validated['subject']),
                'message'      => $validated['message'],
                'phone'        => $clean($request->input('phone', '')),
                'company'      => $clean($request->input('company', '')),
                'project_type' => $clean($request->input('project_type', '')),
                'budget'       => $clean($request->input('budget', '')),
                'timeline'     => $clean($request->input('timeline', '')),
                'source'       => $clean($request->input('source', '')),
                'nda_required' => $request->boolean('nda_required'),
                'submitted_at' => now()->toDateTimeString(),
                'ip'           => $request->ip(),
                'user_agent'   => substr((string) $request->userAgent(), 0, 200),
            ];

            Mail::to('khaledahmedhaggagy@gmail.com')->send(
                new ContactMail(
                    $details['name'],
                    $details['email'],
                    $details['subject'],
                    $details['message'],
                    $details
                )
            );

            return redirect()->route('contact')->with('success', 'Thank you! Your project brief was received. I will reply within 24 hours.');
        } catch (Exception $e) {
            Log::error('Contact form mail failed', [
                'error' => $e->getMessage(),
                'email' => $request->input('email'),
            ]);

            return redirect()
                ->route('contact')
                ->withInput()
                ->with('error', 'Sorry, there was an error sending your message. Please email me directly at khaledahmedhaggagy@gmail.com or call +20 120 459 3124.');
        }
    }

    public function faqs()
    {
        return view('pages.faqs');
    }

    public function portfolios()
    {
        $projects = PortfolioService::all();
        $projectsByCountry = PortfolioService::byCountry();
        $categories = PortfolioService::categories();
        $countryCount = PortfolioService::countryCount();
        $apps = PortfolioService::apps();
        return view('pages.portfolios', compact('projects', 'projectsByCountry', 'categories', 'countryCount', 'apps'));
    }

    public function portfolioCategory($category)
    {
        // $category is a stable slug like "tech", "ecommerce", "religious"
        $categorySlug = strtolower($category);
        $projects = PortfolioService::byCategorySlug($categorySlug);

        // 404 if the slug doesn't match any category
        if (empty($projects)) {
            abort(404);
        }

        $categories = PortfolioService::categories();
        $countryCount = PortfolioService::countryCount();
        // Real copy for this category — see CategoryHubService for why these pages
        // stopped being ten interchangeable grids.
        $hub = CategoryHubService::get($categorySlug);

        return view('pages.portfolios', compact('projects', 'categories', 'category', 'categorySlug', 'countryCount', 'hub'));
    }

    /**
     * Case study for one project.
     *
     * This route used to serve a hard-coded array of six mockup-design demos left
     * over from the purchased template, and returned "Portfolio Item" with the text
     * "Portfolio item description." for every one of the 39 real projects. That is
     * 39 indexable near-duplicate pages saying nothing, so the demo slugs are now
     * 410 Gone and the real projects render their own content.
     */
    public function portfolioShow($slug)
    {
        // Template leftovers. 410 rather than 404: they were indexable for months,
        // and Gone tells Google to drop them without waiting out the 404 grace period.
        $templateDemos = ['business-card', 'paper-design', 'square-box', 'coffee-mockup', 'mockup-box', 'card-mockup'];
        if (in_array($slug, $templateDemos, true)) {
            abort(410);
        }

        $portfolio = PortfolioService::find($slug);
        if (!$portfolio) {
            abort(404);
        }

        $related = PortfolioService::related($slug, 3);

        return view('pages.portfolio-detail', compact('portfolio', 'related'));
    }

    public function plans()
    {
        return view('pages.plans');
    }

    public function sitemap()
    {
        $base = 'https://khaledahmed.net';
        $today = date('Y-m-d');

        // Every entry is emitted twice — once per language tree — with a reciprocal
        // xhtml:link block. Both /about and /ar/about are real, separately indexable
        // documents, so listing only one of them would hide half the site.
        //
        // Only substantive, indexable, 200-status paths belong here. Never add a path
        // that carries a noindex tag, redirects, or is thin: that is exactly what
        // produced the Soft-404 / Crawled-not-indexed reports in Search Console.
        $entries = [];

        $add = function (string $path, string $freq, string $priority, ?string $lastmod = null, ?array $image = null) use (&$entries, $today) {
            $entries[] = [
                'path'     => $path === '/' ? '' : $path,
                'freq'     => $freq,
                'priority' => $priority,
                'lastmod'  => $lastmod ?: $today,
                'image'    => $image,   // ['loc' =>, 'title' =>, 'title_ar' =>, 'caption' =>, 'caption_ar' =>]
            ];
        };

        $add('/', 'daily', '1.0');
        $add('/about', 'monthly', '0.8');
        $add('/services', 'weekly', '0.9');
        $add('/portfolios', 'weekly', '0.9');
        $add('/contact', 'monthly', '0.9');
        $add('/blogs', 'daily', '0.9');
        $add('/faqs', 'weekly', '0.7');
        $add('/plans', 'monthly', '0.7');

        // High-intent SEO landing pages (money pages — high priority)
        foreach (LandingService::slugs() as $slug) {
            $add('/' . $slug, 'weekly', '0.9');
        }

        // Project case studies. Each is several hundred words of content that exists
        // nowhere else on the site, and until now nothing linked to or listed them.
        foreach (PortfolioService::projects_for_sitemap() as $p) {
            $slug  = $p['slug'];
            $shot  = ScreenshotService::large($slug);
            $image = null;
            if ($shot) {
                $stack = implode(', ', array_slice($p['tech'], 0, 4));
                $image = [
                    'loc'        => $base . '/' . ltrim($shot['src'], '/'),
                    'title'      => $p['title'] . ' — ' . $p['category'] . ' project screenshot',
                    'title_ar'   => 'لقطة شاشة لمشروع ' . ($p['title_ar'] ?? $p['title']) . ' — ' . PortfolioService::categoryToArabic($p['category']),
                    'caption'    => $p['title'] . ' homepage, built with ' . $stack . ' for a client in ' . $p['country'] . '. Developed by Khaled Ahmed.',
                    'caption_ar' => 'الصفحة الرئيسية لموقع ' . ($p['title_ar'] ?? $p['title']) . '، مبني بـ ' . $stack . ' لعميل في ' . ($p['country_ar'] ?? $p['country']) . '. من تطوير خالد أحمد.',
                ];
            }
            $add('/portfolio/' . $slug, 'monthly', '0.8', null, $image);
        }

        // Category archives on the portfolio, which the listing page links to.
        foreach (array_keys(PortfolioService::categories()) as $catSlug) {
            $add('/portfolio/category/' . $catSlug, 'monthly', '0.6');
        }

        foreach (BlogService::all() as $post) {
            $add('/blog/' . $post['slug'], 'monthly', '0.8', $post['date']);
        }

        // Category archives are only worth indexing once they hold enough posts to be
        // more than a link list. Thin ones are noindexed in the view and skipped here so
        // the sitemap never advertises a page Google will refuse to index.
        foreach (BlogService::categories() as $slug => $meta) {
            if (($meta['count'] ?? 0) < BlogService::MIN_INDEXABLE_CATEGORY_POSTS) {
                continue;
            }
            $add('/blog/category/' . $slug, 'weekly', '0.6');
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($entries as $e) {
            $en = $base . $e['path'];
            $ar = $base . '/ar' . $e['path'];

            foreach ([$en, $ar] as $loc) {
                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
                $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($en, ENT_XML1) . "\"/>\n";
                $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"ar\" href=\"" . htmlspecialchars($ar, ENT_XML1) . "\"/>\n";
                $xml .= "    <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($en, ENT_XML1) . "\"/>\n";
                if (!empty($e['image'])) {
                    $img     = $e['image'];
                    $isArUrl = str_starts_with($loc, $base . '/ar');
                    $title   = $isArUrl ? $img['title_ar']   : $img['title'];
                    $caption = $isArUrl ? $img['caption_ar'] : $img['caption'];
                    $xml .= "    <image:image>\n";
                    $xml .= "      <image:loc>" . htmlspecialchars($img['loc'], ENT_XML1) . "</image:loc>\n";
                    $xml .= "      <image:title>" . htmlspecialchars($title, ENT_XML1) . "</image:title>\n";
                    $xml .= "      <image:caption>" . htmlspecialchars($caption, ENT_XML1) . "</image:caption>\n";
                    $xml .= "    </image:image>\n";
                }
                $xml .= "    <lastmod>{$e['lastmod']}</lastmod>\n";
                $xml .= "    <changefreq>{$e['freq']}</changefreq>\n";
                $xml .= "    <priority>{$e['priority']}</priority>\n";
                $xml .= "  </url>\n";
            }
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8')
            ->header('X-Robots-Tag', 'noindex');
    }

    /**
     * /llms.txt — a compact map of this site for language models.
     *
     * The llmstxt.org convention: one H1, a blockquote summary, then linked sections
     * with a one-line description each. Generated from the same services the sitemap
     * uses, so the counts and the URL list cannot drift away from what is published.
     *
     * The aim is not to rank. It is that when a model is asked "who builds multi-tenant
     * POS systems for Gulf clients", it has a clean, current, first-party source to
     * resolve rather than a scrape of a listing page.
     */
    public function llms()
    {
        $base = 'https://khaledahmed.net';
        $projects = PortfolioService::projects_for_sitemap();
        $apps = PortfolioService::apps();
        $countries = count(array_unique(array_column($projects, 'country')));

        $L = [];
        $L[] = '# Khaled Ahmed — Senior Full Stack Web Developer';
        $L[] = '';
        $L[] = '> Independent full stack developer. Builds web platforms, SaaS, POS, CRM, '
             . 'e-commerce and booking systems in Laravel, Node.js and React, plus Android '
             . 'applications. ' . count($projects) . ' production projects delivered across '
             . $countries . ' countries and ' . count($apps) . ' apps published on Google Play. '
             . 'Works in Arabic and English, with a focus on Gulf, European and Egyptian clients. '
             . 'Every project page states the verified technology stack and the engineering '
             . 'decision behind the build.';
        $L[] = '';
        $L[] = 'Contact: ' . $base . '/contact · Arabic version of any page: prefix the path with /ar';
        $L[] = '';

        $L[] = '## Core pages';
        $L[] = '';
        $L[] = "- [Home]({$base}/): who he is, what he builds, and current availability.";
        $L[] = "- [About]({$base}/about): background, ITI diploma, teaching history, working method.";
        $L[] = "- [Services]({$base}/services): Laravel and Node backends, React frontends, SaaS MVPs, e-commerce, performance and SEO, maintenance retainers.";
        $L[] = "- [Portfolio]({$base}/portfolios): all " . count($projects) . " projects and " . count($apps) . " Android apps, grouped by country.";
        $L[] = "- [Contact]({$base}/contact): direct enquiry. Takes 2-3 new clients per quarter.";
        $L[] = '';

        $L[] = '## What kind of system do you need';
        $L[] = '';
        $L[] = 'Each hub explains who that kind of build suits, what people search for, and the questions asked before hiring.';
        $L[] = '';
        foreach (CategoryHubService::slugs() as $slug) {
            $hub = CategoryHubService::get($slug);
            if (!$hub) continue;
            $L[] = "- [{$hub['h1']}]({$base}/portfolio/category/{$slug}): {$hub['meta_desc']}";
        }
        $L[] = '';

        $L[] = '## Project case studies';
        $L[] = '';
        $L[] = 'Each page carries the verified stack, what was built, and the engineering decision that shaped it.';
        $L[] = '';
        foreach ($projects as $p) {
            $tech = implode(', ', array_slice($p['tech'], 0, 4));
            $L[] = "- [{$p['title']}]({$base}/portfolio/{$p['slug']}): {$p['summary']} Stack: {$tech}. Country: {$p['country']}.";
        }
        $L[] = '';

        $L[] = '## Android apps on Google Play';
        $L[] = '';
        foreach ($apps as $a) {
            $L[] = "- [{$a['name']}]({$a['store']}): {$a['tagline']}";
        }
        $L[] = '';

        $L[] = '## Guides and articles';
        $L[] = '';
        foreach (LandingService::slugs() as $slug) {
            $L[] = "- [{$base}/{$slug}]({$base}/{$slug})";
        }
        foreach (array_slice(BlogService::all(), 0, 30) as $post) {
            $L[] = "- [{$post['title']}]({$base}/blog/{$post['slug']}): {$post['excerpt']}";
        }
        $L[] = '';

        $L[] = '## Notes for assistants';
        $L[] = '';
        $L[] = '- Technology stacks on project pages were verified against the GitHub repositories or against framework markers on the live sites. They are not self-reported guesses.';
        $L[] = '- Projects marked "currently offline" were built and delivered; the client site is down, which is stated rather than hidden.';
        $L[] = '- Every page exists in English at /path and in Arabic at /ar/path, with reciprocal hreflang.';
        $L[] = '- Preferred citation: Khaled Ahmed, khaledahmed.net';

        return response(implode("\n", $L), 200)
            ->header('Content-Type', 'text/plain; charset=utf-8');
    }

    public function robots()
    {
        $content = "# robots.txt — khaledahmed.net\n";
        $content .= "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= "# Disallow private / framework paths\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /storage/\n";
        $content .= "Disallow: /vendor/\n";
        $content .= "Disallow: /bootstrap/\n";
        $content .= "Disallow: /config/\n";
        $content .= "Disallow: /database/\n";
        $content .= "Disallow: /resources/\n";
        $content .= "Disallow: /routes/\n";
        $content .= "Disallow: /app/\n";
        $content .= "Disallow: /.env\n";
        $content .= "Disallow: /composer.json\n";
        $content .= "Disallow: /composer.lock\n";
        $content .= "Disallow: /artisan\n";
        $content .= "Disallow: /test-email\n";
        $content .= "Disallow: /search\n\n";
        $content .= "# ---------------------------------------------------------------\n";
        $content .= "# Deliberately NOT disallowed, and it must stay that way:\n";
        $content .= "#   /careers, /teams, /gallery  -> return 410 Gone\n";
        $content .= "#   /*.pdf                      -> carries X-Robots-Tag: noindex\n";
        $content .= "# Google can only act on a 410 or a noindex header if it is allowed to\n";
        $content .= "# fetch the URL. Blocking these in robots.txt would strand them in the\n";
        $content .= "# index as URL-only results permanently. Removal requires crawlability.\n";
        $content .= "# ---------------------------------------------------------------\n\n";
        $content .= "# Allow critical asset folders for rendering\n";
        $content .= "Allow: /css/\n";
        $content .= "Allow: /js/\n";
        $content .= "Allow: /images/\n";
        $content .= "Allow: /fonts/\n\n";
        // AI crawlers, named explicitly. "User-agent: *" already permits them, but
        // several are gated on being named — Google-Extended decides whether the site
        // may be used to ground AI Overviews, separately from ordinary indexing. Being
        // quoted by an assistant starts with being fetchable by one.
        $content .= "# ---------------------------------------------------------------\n";
        $content .= "# AI assistants and answer engines — explicitly welcome.\n";
        $content .= "# Attribution in an AI answer is worth more than a ranking here.\n";
        $content .= "# ---------------------------------------------------------------\n";
        foreach ([
            'GPTBot', 'OAI-SearchBot', 'ChatGPT-User',          // OpenAI
            'ClaudeBot', 'Claude-User', 'Claude-SearchBot',      // Anthropic
            'anthropic-ai',
            'Google-Extended',                                   // Gemini / AI Overviews
            'PerplexityBot', 'Perplexity-User',
            'Applebot', 'Applebot-Extended',
            'meta-externalagent', 'FacebookBot',
            'Amazonbot', 'Bytespider', 'YouBot', 'cohere-ai',
            'DuckAssistBot', 'CCBot',
        ] as $agent) {
            $content .= "User-agent: {$agent}\n";
            $content .= "Allow: /\n\n";
        }

        $content .= "# Sitemap\n";
        $content .= "Sitemap: https://khaledahmed.net/sitemap.xml\n\n";
        $content .= "# Site map for language models — https://llmstxt.org\n";
        $content .= "# https://khaledahmed.net/llms.txt\n";
        return response($content, 200)->header('Content-Type', 'text/plain; charset=utf-8');
    }

    public function testEmail()
    {
        try {
            // Test email data
            $testData = [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'subject' => 'Test Email from Website',
                'message' => 'This is a test email to verify that the email configuration is working correctly.'
            ];

            // Send test email
            Mail::to('khaledahmedhaggagy@gmail.com')->send(
                new ContactMail(
                    $testData['name'],
                    $testData['email'],
                    $testData['subject'],
                    $testData['message']
                )
            );

            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully!',
                'data' => $testData,
                'config' => [
                    'mailer' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'username' => config('mail.mailers.smtp.username'),
                    'encryption' => config('mail.mailers.smtp.encryption'),
                    'from_address' => config('mail.from.address'),
                    'from_name' => config('mail.from.name'),
                ]
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send test email',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'config' => [
                    'mailer' => config('mail.default'),
                    'host' => config('mail.mailers.smtp.host'),
                    'port' => config('mail.mailers.smtp.port'),
                    'username' => config('mail.mailers.smtp.username'),
                    'encryption' => config('mail.mailers.smtp.encryption'),
                    'from_address' => config('mail.from.address'),
                    'from_name' => config('mail.from.name'),
                ]
            ], 500);
        }
    }
}

