<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Content routes live inside an optional "{locale?}" prefix constrained to
| "ar", giving every page two real URLs:
|
|     /about      -> English
|     /ar/about   -> Arabic
|
| Before this, both languages were served from the same URL and picked by a
| cookie / Accept-Language sniff. Googlebot does not send Accept-Language:ar,
| so it only ever saw the English rendering and the entire Arabic translation
| was unindexable. Separate URLs make both versions crawlable and let the
| hreflang pair in the layout point somewhere real.
|
| SetLocale reads the prefix and calls URL::defaults(), so every existing
| route('about') call keeps the visitor inside their language automatically.
|
*/

// ---------------------------------------------------------------------
// Infrastructure — one canonical URL each, never mirrored per language.
// Registered first so nothing below can shadow them.
// ---------------------------------------------------------------------
Route::get('/sitemap.xml', [App\Http\Controllers\PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [App\Http\Controllers\PageController::class, 'robots'])->name('robots');

// Language switcher — maps the current URL to its counterpart in the other language.
Route::get('/lang/{locale}', [App\Http\Controllers\LocaleController::class, 'switch'])
    ->where('locale', 'en|ar')
    ->name('lang.switch');

// Search redirect — fixes Search Console 404 for /search?q={search_term_string}
Route::get('/search', function () {
    $q = request('q');
    return redirect()->route('blogs', $q ? ['q' => $q] : [], 301);
})->name('search');

// Permanently removed pages. These were leftover theme stubs with ~90 words and a
// single stock image; they were orphaned (no nav link) yet still listed in the
// sitemap, which is what produced the Soft-404 / Crawled-not-indexed reports.
// 410 Gone tells Google to drop them from the index faster than a 404 does.
foreach (['careers', 'gallery', 'teams'] as $goneSlug) {
    Route::get('/' . $goneSlug, fn () => response('Gone', 410))->name('gone.' . $goneSlug);
    Route::get('/ar/' . $goneSlug, fn () => response('Gone', 410))->name('gone.ar.' . $goneSlug);
}

// Legacy redirect for an old indexed /test page
Route::permanentRedirect('/test', '/');

// ---------------------------------------------------------------------
// Localised content
//
// The prefix is decided from the incoming path, so exactly one tree is
// registered per request and every route keeps its normal name. That means
// route('about') already returns /ar/about while the visitor is in the Arabic
// tree, and no Blade template needed touching.
//
// A "{locale?}" group prefix looks tidier but does not work: Laravel only
// supports optional parameters as the *trailing* segment, so "{locale?}/about"
// compiles to a regex that requires the segment and every English URL 404s.
//
// NOTE: because the route table varies per request, `php artisan route:cache`
// must never be used here — it would freeze whichever tree happened to be
// registered. Deploys run `route:clear`. (The /search closure above already
// makes route:cache fail loudly, which keeps this honest.)
// ---------------------------------------------------------------------
$khPath = trim(parse_url(request()->getRequestUri(), PHP_URL_PATH) ?? '', '/');
$khIsArabicTree = $khPath === 'ar' || str_starts_with($khPath, 'ar/');

Route::prefix($khIsArabicTree ? 'ar' : '')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
    Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');

    // Blog
    Route::get('/blogs', [App\Http\Controllers\PageController::class, 'blogs'])->name('blogs');
    Route::get('/blog/category/{category}', [App\Http\Controllers\PageController::class, 'blogCategory'])->name('blog.category');
    Route::get('/blog/{slug}', [App\Http\Controllers\PageController::class, 'blogShow'])->name('blog.show');

    // Portfolio
    Route::get('/portfolios', [App\Http\Controllers\PageController::class, 'portfolios'])->name('portfolios');
    Route::get('/portfolio/category/{category}', [App\Http\Controllers\PageController::class, 'portfolioCategory'])->name('portfolios.category');
    Route::get('/portfolio/{slug}', [App\Http\Controllers\PageController::class, 'portfolioShow'])->name('portfolio.show');

    Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [App\Http\Controllers\PageController::class, 'contactSubmit'])->name('contact.submit');
    Route::get('/faqs', [App\Http\Controllers\PageController::class, 'faqs'])->name('faqs');
    Route::get('/plans', [App\Http\Controllers\PageController::class, 'plans'])->name('plans');

    // High-intent SEO landing pages. The constraint is built from LandingService so a new
    // page needs only a service entry, not a route edit — but it stays a strict whitelist,
    // so this catch-all-shaped route can never shadow one of the pages above.
    Route::get('/{landing}', [App\Http\Controllers\PageController::class, 'landing'])
        ->where('landing', implode('|', array_map(
            fn ($s) => preg_quote($s, '/'),
            App\Services\LandingService::slugs()
        )))
        ->name('landing');
});
