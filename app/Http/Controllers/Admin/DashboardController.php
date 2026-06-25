<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\CorporateLead;
use App\Models\PageSeo;
use App\Models\Post;
use App\Models\ProductReview;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $hasReviews  = Schema::hasTable('product_reviews');
        $hasMessages = Schema::hasTable('contact_messages');
        $hasLeads    = Schema::hasTable('corporate_leads');
        $hasPosts    = Schema::hasTable('posts');

        return view('admin.dashboard', [
            'stats' => [
                'new_leads'        => $hasLeads ? CorporateLead::where('status', 'new')->count() : 0,
                'pending_reviews'  => $hasReviews ? ProductReview::pending()->count() : 0,
                'new_messages'     => $hasMessages ? ContactMessage::where('status', 'new')->count() : 0,
                'published_posts'  => $hasPosts ? Post::where('status', 'published')->count() : 0,
            ],
            'secondary' => [
                'settings_count' => Setting::count(),
                'seo_count'      => PageSeo::count(),
            ],
            'recentLeads'    => $hasLeads ? CorporateLead::latest()->take(5)->get() : collect(),
            'recentReviews'  => $hasReviews ? ProductReview::latest()->take(5)->get() : collect(),
            'recentMessages' => $hasMessages ? ContactMessage::latest()->take(5)->get() : collect(),
        ]);
    }
}
