<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryPhotoController extends Controller
{
    public function index(): View
    {
        return view('admin.gallery.index', [
            'items' => GalleryPhoto::orderBy('sort')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.gallery.form', [
            'item' => new GalleryPhoto([
                'is_active' => true,
                'sort'      => (int) GalleryPhoto::max('sort') + 1,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Çoklu yükleme desteği
        if ($request->hasFile('image_files_upload')) {
            $maxSort = (int) GalleryPhoto::max('sort');
            $count = 0;
            foreach ((array) $request->file('image_files_upload') as $file) {
                if (! $file || ! $file->isValid()) {
                    continue;
                }
                $path = $file->store('etkinlik-kamp', 'public');
                GalleryPhoto::create([
                    'image_path' => $path,
                    'caption'    => null,
                    'sort'       => ++$maxSort,
                    'is_active'  => true,
                ]);
                $count++;
            }
            return redirect()->route('admin.gallery.index')
                ->with('status', "{$count} fotoğraf eklendi.");
        }

        // Tekli yükleme
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:200'],
            'sort'    => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $path = $request->file('image_file_upload')->store('etkinlik-kamp', 'public');

        GalleryPhoto::create([
            'image_path' => $path,
            'caption'    => $data['caption'] ?? null,
            'sort'       => $data['sort'] ?? ((int) GalleryPhoto::max('sort') + 1),
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('status', 'Fotoğraf eklendi.');
    }

    public function edit(GalleryPhoto $photo): View
    {
        return view('admin.gallery.form', ['item' => $photo]);
    }

    public function update(Request $request, GalleryPhoto $photo): RedirectResponse
    {
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:200'],
            'sort'    => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        if ($request->hasFile('image_file_upload')) {
            if ($photo->image_path
                && !preg_match('#^https?://#', $photo->image_path)
                && !str_starts_with($photo->image_path, 'etkinlik-kamp/')) {
                $this->deleteFile($photo->image_path);
            }
            $photo->image_path = $request->file('image_file_upload')->store('etkinlik-kamp', 'public');
        }

        $photo->caption   = $data['caption'] ?? null;
        $photo->sort      = $data['sort'] ?? $photo->sort;
        $photo->is_active = $request->boolean('is_active');
        $photo->save();

        return redirect()->route('admin.gallery.index')
            ->with('status', 'Fotoğraf güncellendi.');
    }

    public function destroy(GalleryPhoto $photo): RedirectResponse
    {
        if ($photo->image_path
            && !preg_match('#^https?://#', $photo->image_path)
            && !str_starts_with($photo->image_path, 'etkinlik-kamp/')) {
            // Sadece sonradan yüklenenleri sil; seed edilmiş klasördekileri koru
            $this->deleteFile($photo->image_path);
        }
        $photo->delete();
        return back()->with('status', 'Fotoğraf silindi.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order'   => ['required', 'array'],
            'order.*' => ['integer'],
        ]);
        foreach ($data['order'] as $pos => $id) {
            GalleryPhoto::where('id', $id)->update(['sort' => $pos + 1]);
        }
        return response()->json(['ok' => true]);
    }

    private function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
