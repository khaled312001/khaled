<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function() {
    return view('test');
});
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\PageController::class, 'services'])->name('services');
Route::get('/blogs', [App\Http\Controllers\PageController::class, 'blogs'])->name('blogs');
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

