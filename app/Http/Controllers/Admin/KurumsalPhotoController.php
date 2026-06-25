<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KurumsalPhoto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class KurumsalPhotoController extends Controller
{
    private const FOLDER = 'kurumsal-etkinlikler';

    public function index(): View
    {
        return view('admin.kurumsal-photos.index', [
            'items' => KurumsalPhoto::orderBy('sort')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.kurumsal-photos.form', [
            'item' => new KurumsalPhoto([
                'is_active' => true,
                'sort'      => (int) KurumsalPhoto::max('sort') + 1,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        // Çoklu yükleme desteği
        if ($request->hasFile('image_files_upload')) {
            $maxSort = (int) KurumsalPhoto::max('sort');
            $count = 0;
            foreach ((array) $request->file('image_files_upload') as $file) {
                if (! $file || ! $file->isValid()) {
                    continue;
                }
                $path = $file->store(self::FOLDER, 'public');
                KurumsalPhoto::create([
                    'image_path' => $path,
                    'caption'    => null,
                    'sort'       => ++$maxSort,
                    'is_active'  => true,
                ]);
                $count++;
            }
            return redirect()->route('admin.kurumsal-photos.index')
                ->with('status', "{$count} fotoğraf eklendi.");
        }

        // Tekli yükleme
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:200'],
            'sort'    => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        $path = $request->file('image_file_upload')->store(self::FOLDER, 'public');

        KurumsalPhoto::create([
            'image_path' => $path,
            'caption'    => $data['caption'] ?? null,
            'sort'       => $data['sort'] ?? ((int) KurumsalPhoto::max('sort') + 1),
            'is_active'  => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.kurumsal-photos.index')
            ->with('status', 'Fotoğraf eklendi.');
    }

    public function edit(KurumsalPhoto $kurumsalPhoto): View
    {
        return view('admin.kurumsal-photos.form', ['item' => $kurumsalPhoto]);
    }

    public function update(Request $request, KurumsalPhoto $kurumsalPhoto): RedirectResponse
    {
        $data = $request->validate([
            'caption' => ['nullable', 'string', 'max:200'],
            'sort'    => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        if ($request->hasFile('image_file_upload')) {
            if ($kurumsalPhoto->image_path
                && !preg_match('#^https?://#', $kurumsalPhoto->image_path)
                && !str_starts_with($kurumsalPhoto->image_path, self::FOLDER . '/')) {
                $this->deleteFile($kurumsalPhoto->image_path);
            }
            $kurumsalPhoto->image_path = $request->file('image_file_upload')->store(self::FOLDER, 'public');
        }

        $kurumsalPhoto->caption   = $data['caption'] ?? null;
        $kurumsalPhoto->sort      = $data['sort'] ?? $kurumsalPhoto->sort;
        $kurumsalPhoto->is_active = $request->boolean('is_active');
        $kurumsalPhoto->save();

        return redirect()->route('admin.kurumsal-photos.index')
            ->with('status', 'Fotoğraf güncellendi.');
    }

    public function destroy(KurumsalPhoto $kurumsalPhoto): RedirectResponse
    {
        if ($kurumsalPhoto->image_path
            && !preg_match('#^https?://#', $kurumsalPhoto->image_path)
            && !str_starts_with($kurumsalPhoto->image_path, self::FOLDER . '/')) {
            // Sadece sonradan yüklenenleri sil; seed edilmiş klasördekileri koru
            $this->deleteFile($kurumsalPhoto->image_path);
        }
        $kurumsalPhoto->delete();
        return back()->with('status', 'Fotoğraf silindi.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order'   => ['required', 'array'],
            'order.*' => ['integer'],
        ]);
        foreach ($data['order'] as $pos => $id) {
            KurumsalPhoto::where('id', $id)->update(['sort' => $pos + 1]);
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
