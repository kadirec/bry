<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::query()->with('category')->latest('id');

        if ($s = $request->query('q')) {
            $query->where('title', 'like', "%{$s}%");
        }
        if ($cat = $request->query('category')) {
            $query->where('category_id', $cat);
        }
        if ($status = $request->query('status')) {
            $query->where('status', $status);
        }

        return view('admin.blog.posts.index', [
            'posts'      => $query->paginate(15)->withQueryString(),
            'categories' => Category::orderBy('name')->get(),
            'filters'    => $request->only(['q', 'category', 'status']),
        ]);
    }

    public function create(): View
    {
        return view('admin.blog.posts.form', [
            'post'       => new Post(['status' => 'draft', 'author' => 'Tuncay Vural']),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        $data['featured_image'] = $this->handleUpload($request, null);

        $post = Post::create($data);
        return redirect()->route('admin.blog.posts.edit', $post)
            ->with('status', '"' . $post->title . '" yazısı oluşturuldu.');
    }

    public function edit(Post $post): View
    {
        return view('admin.blog.posts.form', [
            'post'       => $post,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $data = $this->validateData($request, $post->id);

        if ($newImage = $this->handleUpload($request, $post->featured_image)) {
            $data['featured_image'] = $newImage;
        }
        // Görseli silme checkbox'ı işaretliyse
        if ($request->boolean('remove_image') && $post->featured_image) {
            $this->deleteFile($post->featured_image);
            $data['featured_image'] = null;
        }

        $post->update($data);
        return redirect()->route('admin.blog.posts.edit', $post)
            ->with('status', '"' . $post->title . '" güncellendi.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->featured_image) {
            $this->deleteFile($post->featured_image);
        }
        $title = $post->title;
        $post->delete();
        return redirect()->route('admin.blog.posts.index')
            ->with('status', '"' . $title . '" silindi.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        $rules = [
            'title'            => ['required', 'string', 'max:255'],
            'slug'             => ['nullable', 'string', 'max:255', 'alpha_dash',
                Rule::unique('posts', 'slug')->ignore($ignoreId)],
            'category_id'      => ['nullable', 'integer', 'exists:categories,id'],
            'excerpt'          => ['nullable', 'string', 'max:600'],
            'body'             => ['nullable', 'string'],
            'author'           => ['required', 'string', 'max:120'],
            'reading_minutes'  => ['nullable', 'integer', 'min:1', 'max:300'],
            'is_featured'      => ['nullable', 'boolean'],
            'status'           => ['required', 'in:draft,published'],
            'published_at'     => ['nullable', 'date'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'og_image'         => ['nullable', 'string', 'max:500'],
            'featured_image_file' => ['nullable', 'image', 'max:4096'],
        ];

        $data = $request->validate($rules);
        $data['is_featured'] = $request->boolean('is_featured');

        // featured_image_file validation field'i fillable değil, ayır
        unset($data['featured_image_file']);

        return $data;
    }

    private function handleUpload(Request $request, ?string $existingPath): ?string
    {
        if (! $request->hasFile('featured_image_file')) {
            return null;
        }

        if ($existingPath) {
            $this->deleteFile($existingPath);
        }

        return $request->file('featured_image_file')->store('blog', 'public');
    }

    private function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
