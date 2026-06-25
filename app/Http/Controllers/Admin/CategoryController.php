<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('admin.blog.categories.index', [
            'categories' => Category::withCount('posts')->orderBy('sort')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.blog.categories.form', [
            'category' => new Category(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);
        Category::create($data);
        return redirect()->route('admin.blog.categories.index')
            ->with('status', '"' . $data['name'] . '" kategorisi eklendi.');
    }

    public function edit(Category $category): View
    {
        return view('admin.blog.categories.form', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $data = $this->validateData($request, $category->id);
        $category->update($data);
        return redirect()->route('admin.blog.categories.index')
            ->with('status', '"' . $category->name . '" güncellendi.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return back()->with('status', '"' . $category->name . '" silindi.');
    }

    private function validateData(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name'        => ['required', 'string', 'max:120'],
            'slug'        => ['nullable', 'string', 'max:140', 'alpha_dash',
                'unique:categories,slug' . ($ignoreId ? ",{$ignoreId}" : '')],
            'description' => ['nullable', 'string', 'max:500'],
            'color'       => ['nullable', 'string', 'max:20'],
            'sort'        => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
