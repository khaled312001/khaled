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
Route::get('/gallery', [App\Http\Controllers\PageController::class, 'gallery'])->name('gallery');
Route::get('/teams', [App\Http\Controllers\PageController::class, 'teams'])->name('teams');
Route::get('/portfolios', [App\Http\Controllers\PageController::class, 'portfolios'])->name('portfolios');
Route::get('/portfolio/category/{category}', [App\Http\Controllers\PageController::class, 'portfolioCategory'])->name('portfolios.category');
Route::get('/portfolio/{slug}', [App\Http\Controllers\PageController::class, 'portfolioShow'])->name('portfolio.show');
Route::get('/plans', [App\Http\Controllers\PageController::class, 'plans'])->name('plans');
Route::get('/careers', [App\Http\Controllers\PageController::class, 'careers'])->name('careers');

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
