<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');

// Blog routes (rich SEO content)
Route::get('/blogs', [App\Http\Controllers\PageController::class, 'blogs'])->name('blogs');
Route::get('/blog/category/{category}', [App\Http\Controllers\PageController::class, 'blogCategory'])->name('blog.category');
Route::get('/blog/{slug}', [App\Http\Controllers\PageController::class, 'blogShow'])->name('blog.show');

Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\PageController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/faqs', [App\Http\Controllers\PageController::class, 'faqs'])->name('faqs');
Route::get('/portfolios', [App\Http\Controllers\PageController::class, 'portfolios'])->name('portfolios');
Route::get('/portfolio/category/{category}', [App\Http\Controllers\PageController::class, 'portfolioCategory'])->name('portfolios.category');
Route::get('/portfolio/{slug}', [App\Http\Controllers\PageController::class, 'portfolioShow'])->name('portfolio.show');
Route::get('/plans', [App\Http\Controllers\PageController::class, 'plans'])->name('plans');
// Permanently removed pages. These were leftover theme stubs with ~90 words and a single
// stock image; they were orphaned (no nav link) yet still listed in the sitemap, which is
// what produced the Soft-404 / Crawled-not-indexed reports in Search Console.
// 410 Gone tells Google to drop them from the index faster than a 404 does.
foreach (['careers', 'gallery', 'teams'] as $goneSlug) {
    Route::get('/' . $goneSlug, fn () => response('Gone', 410))->name('gone.' . $goneSlug);
}

// SEO infrastructure
Route::get('/sitemap.xml', [App\Http\Controllers\PageController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [App\Http\Controllers\PageController::class, 'robots'])->name('robots');

// Search redirect — fixes Search Console 404 for /search?q={search_term_string}
Route::get('/search', function () {
    $q = request('q');
    return redirect()->route('blogs', $q ? ['q' => $q] : [], 301);
})->name('search');

// Legacy redirects to fix old /test page if indexed
Route::permanentRedirect('/test', '/');

// SEO landing pages (high commercial-intent, hire keywords).
// Constrained to known slugs so this top-level route never shadows others.
Route::get('/{landing}', [App\Http\Controllers\PageController::class, 'landing'])
    ->where('landing', 'hire-laravel-developer|hire-react-developer|saas-development|ecommerce-development|mobile-app-development')
    ->name('landing');

// Language switcher
Route::get('/lang/{locale}', [App\Http\Controllers\LocaleController::class, 'switch'])
    ->where('locale', 'en|ar')
    ->name('lang.switch');
