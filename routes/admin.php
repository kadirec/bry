<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CorporateLeadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryPhotoController;
use App\Http\Controllers\Admin\KurumsalPhotoController;
use App\Http\Controllers\Admin\PageSeoController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReferenceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    // Auth (login/logout — admin middleware'siz)
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.store');

    // Korumalı admin alanı
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Site Settings (group bazlı tabs)
        Route::get('settings/{group?}', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('settings/{group}', [SettingsController::class, 'update'])->name('settings.update');

        // SEO Settings (sayfa bazlı)
        Route::get('seo', [PageSeoController::class, 'index'])->name('seo.index');
        Route::get('seo/{page}/edit', [PageSeoController::class, 'edit'])->name('seo.edit');
        Route::post('seo/{page}', [PageSeoController::class, 'update'])->name('seo.update');

        // Blog
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::resource('categories', CategoryController::class)->except(['show']);
            Route::resource('posts',      PostController::class)->except(['show']);
        });

        // Dönüşen Hayatlar (testimonials / reels)
        Route::resource('testimonials', TestimonialController::class)->except(['show']);

        // Kurumsal Referanslar (logo grid)
        Route::post('references/reorder', [ReferenceController::class, 'reorder'])->name('references.reorder');
        Route::resource('references', ReferenceController::class)->except(['show']);

        // Etkinlik ve Kamp Fotoğrafları (gallery)
        Route::post('gallery/reorder', [GalleryPhotoController::class, 'reorder'])->name('gallery.reorder');
        Route::get('gallery',                  [GalleryPhotoController::class, 'index'])->name('gallery.index');
        Route::get('gallery/create',           [GalleryPhotoController::class, 'create'])->name('gallery.create');
        Route::post('gallery',                 [GalleryPhotoController::class, 'store'])->name('gallery.store');
        Route::get('gallery/{photo}/edit',     [GalleryPhotoController::class, 'edit'])->name('gallery.edit');
        Route::put('gallery/{photo}',          [GalleryPhotoController::class, 'update'])->name('gallery.update');
        Route::delete('gallery/{photo}',       [GalleryPhotoController::class, 'destroy'])->name('gallery.destroy');

        // Kurumsal Etkinlik Fotoğrafları
        Route::post('kurumsal-photos/reorder', [KurumsalPhotoController::class, 'reorder'])->name('kurumsal-photos.reorder');
        Route::get('kurumsal-photos',                       [KurumsalPhotoController::class, 'index'])->name('kurumsal-photos.index');
        Route::get('kurumsal-photos/create',                [KurumsalPhotoController::class, 'create'])->name('kurumsal-photos.create');
        Route::post('kurumsal-photos',                      [KurumsalPhotoController::class, 'store'])->name('kurumsal-photos.store');
        Route::get('kurumsal-photos/{kurumsalPhoto}/edit',  [KurumsalPhotoController::class, 'edit'])->name('kurumsal-photos.edit');
        Route::put('kurumsal-photos/{kurumsalPhoto}',       [KurumsalPhotoController::class, 'update'])->name('kurumsal-photos.update');
        Route::delete('kurumsal-photos/{kurumsalPhoto}',    [KurumsalPhotoController::class, 'destroy'])->name('kurumsal-photos.destroy');

        // Eğitim Değerlendirmeleri
        Route::post('product-reviews/{product_review}/toggle', [\App\Http\Controllers\Admin\ProductReviewController::class, 'toggle'])->name('product-reviews.toggle');
        Route::resource('product-reviews', \App\Http\Controllers\Admin\ProductReviewController::class)->except(['show']);

        // Kurumsal Teklif Formu (CRM leads)
        Route::get('corporate-leads',           [CorporateLeadController::class, 'index'])->name('corporate-leads.index');
        Route::get('corporate-leads/{corporateLead}',     [CorporateLeadController::class, 'show'])->name('corporate-leads.show');
        Route::patch('corporate-leads/{corporateLead}',   [CorporateLeadController::class, 'update'])->name('corporate-leads.update');
        Route::delete('corporate-leads/{corporateLead}',  [CorporateLeadController::class, 'destroy'])->name('corporate-leads.destroy');

        // İletişim Formları
        Route::get('contact-messages',                       [\App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contactMessage}',      [\App\Http\Controllers\Admin\ContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::patch('contact-messages/{contactMessage}',    [\App\Http\Controllers\Admin\ContactMessageController::class, 'update'])->name('contact-messages.update');
        Route::delete('contact-messages/{contactMessage}',   [\App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    });
});
