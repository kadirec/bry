<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageSeoController extends Controller
{
    public function index(): View
    {
        return view('admin.seo.index', [
            'pages' => PageSeo::orderBy('id')->get(),
        ]);
    }

    public function edit(PageSeo $page): View
    {
        return view('admin.seo.edit', ['page' => $page]);
    }

    public function update(Request $request, PageSeo $page): RedirectResponse
    {
        $data = $request->validate([
            'label'       => ['required', 'string', 'max:120'],
            'title'       => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'keywords'    => ['nullable', 'string', 'max:1000'],
            'canonical'   => ['nullable', 'url', 'max:500'],
            'og_image'    => ['nullable', 'string', 'max:500'],
            'og_type'     => ['nullable', 'string', 'max:60'],
            'robots'      => ['nullable', 'string', 'max:120'],
            'jsonld'      => ['nullable', 'string'],
        ]);

        $page->update($data);

        return redirect()->route('admin.seo.index')->with('status', '"' . $page->label . '" SEO ayarları kaydedildi.');
    }
}
