<?php

namespace App\Providers;

use App\Models\PageSeo;
use App\Models\Post;
use App\Models\ProductReview;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Yetkisiz istekleri admin login'e yönlendir
        Authenticate::redirectUsing(fn () => route('admin.login'));

        // Sayfalama yalnızca admin panelinde kullanılıyor; Laravel'in varsayılan
        // görünümü Tailwind sınıflarına dayanıyor ve panel Tailwind yüklemediği
        // için stilsiz görünüyordu. Panelin kendi işaretlemesine geçiliyor.
        Paginator::defaultView('pagination.admin');
        Paginator::defaultSimpleView('pagination.admin-simple');

        View::composer('*', function ($view) {
            // Ayarları her view'a paylaş
            try {
                $view->with('site', Schema::hasTable('settings') ? Setting::allKeyed() : []);
            } catch (\Throwable $e) {
                $view->with('site', []);
            }

            // Mevcut route adına bağlı PageSeo
            try {
                $routeName = optional(Route::current())->getName();
                $view->with('pageSeo', Schema::hasTable('page_seos') ? PageSeo::forRoute($routeName) : null);
            } catch (\Throwable $e) {
                $view->with('pageSeo', null);
            }
        });

        // Anasayfa ve BRY Metodu Eğitimi sayfası için aktif testimonial'lar
        View::composer(['pages.home', 'pages.programs.bry-methodu-egitimi'], function ($view) {
            try {
                $view->with('homeTestimonials', Schema::hasTable('testimonials')
                    ? Testimonial::active()->forHome()->orderBy('sort')->orderBy('id')->get()
                    : collect());
            } catch (\Throwable $e) {
                $view->with('homeTestimonials', collect());
            }
        });

        // Anasayfa blog carousel — panelden seçili yazılar; yoksa son 12
        View::composer('pages.home', function ($view) {
            try {
                if (! Schema::hasTable('posts')) {
                    $view->with('homeLatestPosts', collect());
                    return;
                }

                $hasHomeCols = Schema::hasColumn('posts', 'show_on_home');
                $selected = $hasHomeCols
                    ? Post::published()->with('category')
                        ->where('show_on_home', true)
                        ->orderBy('home_sort')->newestFirst()
                        ->limit(12)->get()
                    : collect();

                $posts = $selected->isNotEmpty()
                    ? $selected
                    : Post::published()->with('category')
                        ->newestFirst()->limit(12)->get();

                $view->with('homeLatestPosts', $posts);
            } catch (\Throwable $e) {
                $view->with('homeLatestPosts', collect());
            }
        });

        // Gerçek Ben Eğitimi sayfası — tüm onaylı kullanıcı değerlendirmeleri + captcha
        View::composer('pages.programs.gercek-ben-egitimi', function ($view) {
            try {
                $reviews = Schema::hasTable('product_reviews')
                    ? ProductReview::approved()
                        ->orderBy('sort')->orderByDesc('created_at')->get()
                    : collect();
            } catch (\Throwable $e) {
                $reviews = collect();
            }

            // Basit oturum-temelli matematik captcha
            $a = random_int(2, 9);
            $b = random_int(2, 9);
            session(['review_captcha' => (string) ($a + $b)]);

            $view->with([
                'productReviews'   => $reviews,
                'captchaQuestion'  => "$a + $b = ?",
            ]);
        });
    }
}
