<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Services\BlogService;
use App\Services\PortfolioService;
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
        // $category is a stable English slug like "saas", "e-commerce", "devops".
        $categorySlug = strtolower($category);
        $posts = BlogService::byCategorySlug($categorySlug);
        if (empty($posts)) {
            abort(404);
        }
        $categories = BlogService::categories();
        $tags = BlogService::tags();
        return view('pages.blogs', compact('posts', 'categories', 'tags', 'category', 'categorySlug'));
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

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function teams()
    {
        return view('pages.teams');
    }

    public function portfolios()
    {
        $projects = PortfolioService::all();
        $projectsByCountry = PortfolioService::byCountry();
        $categories = PortfolioService::categories();
        $countryCount = PortfolioService::countryCount();
        return view('pages.portfolios', compact('projects', 'projectsByCountry', 'categories', 'countryCount'));
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
        return view('pages.portfolios', compact('projects', 'categories', 'category', 'categorySlug', 'countryCount'));
    }

    public function portfolioShow($slug)
    {
        // Portfolio data
        $portfolios = [
            'business-card' => [
                'title' => 'Business Card Design — ElseColor',
                'category' => 'UI/UX',
                'slug' => 'business-card',
                'date' => '18 March 2024',
                'value' => '$150',
                'customer' => 'ElseColor',
                'created_date' => '20 December 2024',
                'end_date' => '28 December 2024',
                'description' => '<p>A complete business card identity for ElseColor — clean typography, balanced negative space, and print-ready CMYK files. Delivered in PSD, AI, and PDF formats with a 3 mm bleed, ready for both digital sharing and physical printing on 350 gsm matte stock.</p><p>The brief: a card that reads as professional at a first glance but reveals brand personality on closer inspection. The final design uses a two-tone palette grounded in the ElseColor brand guide, a subtle spot-UV accent on the logo, and a back-side QR code linking to the company contact page. Turnaround was 8 days from kickoff to print-ready files.</p>',
                'images' => ['1710766686-portfolio_single_01.jpg', '1710766690-portfolio_single_02.jpg'],
            ],
            'paper-design' => [
                'title' => 'Paper Design',
                'category' => 'Creative',
                'slug' => 'paper-design',
                'date' => '18 March 2024',
                'description' => '<p>Creative paper design project with modern aesthetics.</p>',
                'images' => ['1710766610-portfolio-img-5.jpg'],
            ],
            'square-box' => [
                'title' => 'Square Box',
                'category' => 'Mockup',
                'slug' => 'square-box',
                'date' => '18 March 2024',
                'description' => '<p>Square box mockup design project.</p>',
                'images' => ['1710766597-portfolio-img-4.jpg'],
            ],
            'coffee-mockup' => [
                'title' => 'Coffee Mockup',
                'category' => 'Mockup',
                'slug' => 'coffee-mockup',
                'date' => '18 March 2024',
                'description' => '<p>Coffee mockup design project.</p>',
                'images' => ['no-image.jpg'],
            ],
            'mockup-box' => [
                'title' => 'Mockup Box',
                'category' => 'Mockup',
                'slug' => 'mockup-box',
                'date' => '18 March 2024',
                'description' => '<p>Mockup box design project.</p>',
                'images' => ['1710766555-portfolio-grid-img-2.jpg'],
            ],
            'card-mockup' => [
                'title' => 'Card Mockup',
                'category' => 'Creative',
                'slug' => 'card-mockup',
                'date' => '18 March 2024',
                'description' => '<p>Card mockup design project.</p>',
                'images' => ['1710766541-portfolio-grid-img-1.jpg'],
            ],
        ];

        $portfolio = $portfolios[$slug] ?? [
            'title' => 'Portfolio Item',
            'category' => 'Category',
            'slug' => $slug,
            'date' => '18 March 2024',
            'description' => '<p>Portfolio item description.</p>',
            'images' => ['no-image.jpg'],
        ];

        return view('pages.portfolio-detail', compact('portfolio'));
    }

    public function plans()
    {
        return view('pages.plans');
    }

    public function sitemap()
    {
        $base = 'https://khaledahmed.net';
        $today = date('Y-m-d');

        $staticPages = [
            ['/', 'daily', '1.0'],
            ['/about', 'monthly', '0.8'],
            ['/services', 'weekly', '0.9'],
            ['/portfolios', 'weekly', '0.9'],
            ['/contact', 'monthly', '0.9'],
            ['/blogs', 'daily', '0.9'],
            ['/faqs', 'weekly', '0.7'],
            ['/plans', 'monthly', '0.7'],
            ['/teams', 'monthly', '0.5'],
            ['/gallery', 'monthly', '0.5'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        foreach ($staticPages as [$path, $freq, $priority]) {
            $loc = $base . ($path === '/' ? '' : $path);
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>{$freq}</changefreq>\n";
            $xml .= "    <priority>{$priority}</priority>\n";
            $xml .= "  </url>\n";
        }

        foreach (BlogService::all() as $post) {
            $loc = $base . '/blog/' . $post['slug'];
            $lastmod = $post['date'];
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.8</priority>\n";
            $xml .= "  </url>\n";
        }

        foreach (array_keys(BlogService::categories()) as $cat) {
            $slug = strtolower(str_replace(' ', '-', $cat));
            $loc = $base . '/blog/category/' . $slug;
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$loc}</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.6</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=utf-8')
            ->header('X-Robots-Tag', 'noindex');
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
        $content .= "Disallow: /test\n";
        $content .= "Disallow: /search\n\n";
        $content .= "# Block PDF indexing — fixes Duplicate-without-canonical for /Khaled_Ahmed.pdf\n";
        $content .= "Disallow: /*.pdf$\n\n";
        $content .= "# Allow critical asset folders for rendering\n";
        $content .= "Allow: /css/\n";
        $content .= "Allow: /js/\n";
        $content .= "Allow: /images/\n";
        $content .= "Allow: /fonts/\n\n";
        $content .= "# Sitemap\n";
        $content .= "Sitemap: https://khaledahmed.net/sitemap.xml\n";
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

