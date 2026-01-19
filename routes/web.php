<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProgramController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about');
Route::get('/services', fn() => redirect()->route('pages.show', 'services'))->name('services');
Route::get('/privacy-policy', [PageController::class, 'privacyPage'])->name('privacy');
Route::get('/terms-conditions', [PageController::class, 'termsPage'])->name('terms');
Route::get('/gallery', [PageController::class, 'galleryPage'])->name('gallery');

Route::prefix('programs')->name('programs.')->group(function () {
    Route::get('/', [ProgramController::class, 'index'])->name('index');
    Route::get('/{slug}', [ProgramController::class, 'show'])->name('show');
});

Route::get('/page/{slug}', [PageController::class, 'show'])->name('pages.show');

Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/', [ContactController::class, 'showForm'])->name('show');
    Route::post('/', [ContactController::class, 'submit'])->name('submit');
});



// ========================================
// SEO ROUTES
// ========================================
/*Route::get('/sitemap.xml', function () {
    $pages = \App\Models\Page::where('status', 'active')->get();
    $programs = \App\Models\Program::where('status', 'active')->get();

    $xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    $xml .= '<url><loc>' . url('/') . '</loc><priority>1.0</priority></url>';

    foreach ($programs as $program) {
        $xml .= '<url><loc>' . route('programs.show', $program->slug) . '</loc><priority>0.8</priority></url>';
    }

    foreach ($pages as $page) {
        $xml .= '<url><loc>' . route('pages.show', $page->slug) . '</loc><priority>0.7</priority></url>';
    }

    $xml .= '</urlset>';
    return response($xml, 200, ['Content-Type' => 'application/xml']);
})->name('sitemap');
*/

// Route::get('/robots.txt', function () {
//     return response(<<<TXT
// User-agent: *
// Allow: /

// Sitemap: {{ url('/sitemap.xml') }}
// Disallow: /admin/
// TXT, 200, ['Content-Type' => 'text/plain']);
// })->name('robots');
