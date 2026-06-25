<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $activeCategory = null;
        $query = Post::query()->published()->with('category');

        if ($slug = $request->query('kategori')) {
            $activeCategory = Category::where('slug', $slug)->first();
            if ($activeCategory) {
                $query->where('category_id', $activeCategory->id);
            }
        }

        // Featured post: en yeni öne çıkarılmış, yoksa en yeni yazı
        $featured = (clone $query)->where('is_featured', true)
            ->latest('published_at')->first()
            ?? (clone $query)->latest('published_at')->first();

        $posts = $query
            ->when($featured, fn ($q) => $q->where('id', '!=', $featured->id))
            ->latest('published_at')
            ->get();

        $categories = Category::withCount(['posts as posts_count' => fn ($q) => $q->published()])
            ->orderBy('sort')->orderBy('name')->get();

        return view('pages.blog', [
            'featured'       => $featured,
            'posts'          => $posts,
            'categories'     => $categories,
            'activeCategory' => $activeCategory,
            'totalCount'     => Post::published()->count(),
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless($post->status === 'published'
            && (! $post->published_at || $post->published_at->isPast()), 404);

        // Read counter — basit
        $post->increment('views');

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn ($q) => $q->where('category_id', $post->category_id))
            ->latest('published_at')->limit(3)->get();

        return view('pages.blog-show', [
            'post'    => $post->load('category'),
            'related' => $related,
        ]);
    }
}
