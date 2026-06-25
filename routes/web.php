<?php

use Illuminate\Support\Facades\Route;

// ─── Public site ──────────────────────────────────────────────────────────────
Route::view('/', 'pages.home')->name('home');
Route::view('/bry-nedir', 'pages.bry-nedir')->name('bry-nedir');
Route::view('/tuncay-vural', 'pages.tuncay-vural')->name('tuncay-vural');
Route::view('/bry-metodu-ile-tanis', 'pages.bry-metodu-ile-tanis')->name('bry-metodu-ile-tanis');

// Eğitimler
Route::view('/bry-bireysel-ve-ozel-programlar', 'pages.programs.bireysel')->name('programs.bireysel');
Route::view('/bry-online-akademi', 'pages.programs.online')->name('programs.online');
Route::view('/bry-methodu-egitimi', 'pages.programs.bry-methodu-egitimi')->name('programs.methodu-egitimi');
Route::view('/gercek-ben-egitimi', 'pages.programs.gercek-ben-egitimi')->name('programs.gercek-ben');
Route::view('/bry-kurumsal-programlar', 'pages.programs.kurumsal')->name('programs.kurumsal');

// Deneyimler
Route::get('/bry-ile-donusen-hayatlar',                  [\App\Http\Controllers\DonusenHayatlarController::class, 'index'])->name('deneyimler.donusen');
Route::view('/etkinlik-ve-kamp', 'pages.deneyimler.etkinlik-kamp')->name('deneyimler.etkinlik');
Route::view('/kurumsal-referanslar', 'pages.deneyimler.kurumsal-referanslar')->name('deneyimler.referanslar');
Route::view('/kurumsal-etkinlikler', 'pages.deneyimler.kurumsal-etkinlikler')->name('deneyimler.kurumsal');

Route::get('/blog',         [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post}',  [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::view('/iletisim', 'pages.iletisim')->name('iletisim');

// Media streaming — Range request destekli (dev server için gerekli)
Route::get('/media/{file}', function (string $file) {
    foreach ([
        storage_path('app/public/' . $file),
        public_path('assets/' . $file),
    ] as $path) {
        if (is_file($path)) {
            return response()->file($path);
        }
    }
    abort(404);
})->where('file', '[A-Za-z0-9._-]+\.(mp4|webm|mov|m4v)')->name('media.stream');

// Kurumsal teklif formu (public POST)
Route::post('/kurumsal-teklif', [\App\Http\Controllers\CorporateLeadController::class, 'store'])
    ->name('corporate.leads.store');

// İletişim formu (public POST) — anasayfa, alt sayfalar, /iletisim
Route::post('/iletisim-gonder', [\App\Http\Controllers\ContactMessageController::class, 'store'])
    ->name('contact-messages.store');

// Eğitim değerlendirmeleri (public POST)
Route::post('/degerlendirme-gonder', [\App\Http\Controllers\ProductReviewController::class, 'store'])
    ->name('product-reviews.store');

// ─── Admin panel ──────────────────────────────────────────────────────────────
require __DIR__ . '/admin.php';
