<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReferenceController extends Controller
{
    public function index(): View
    {
        return view('admin.references.index', [
            'items' => Reference::orderBy('sort')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.references.form', [
            'item' => new Reference(['is_active' => true, 'sort' => Reference::max('sort') + 1]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request, true);

        if ($path = $this->handleImageUpload($request, null)) {
            $data['image_path'] = $path;
        }

        Reference::create($data);

        return redirect()->route('admin.references.index')
            ->with('status', '"' . $data['name'] . '" referansı eklendi.');
    }

    public function edit(Reference $reference): View
    {
        return view('admin.references.form', ['item' => $reference]);
    }

    public function update(Request $request, Reference $reference): RedirectResponse
    {
        $data = $this->validateData($request, false);

        if ($path = $this->handleImageUpload($request, $reference->image_path)) {
            $data['image_path'] = $path;
        }

        $reference->update($data);

        return redirect()->route('admin.references.index')
            ->with('status', '"' . $reference->name . '" güncellendi.');
    }

    public function destroy(Reference $reference): RedirectResponse
    {
        if ($reference->image_path && !preg_match('#^https?://#', $reference->image_path)) {
            // Sadece DB'den gelen yeni yüklenenleri sil; seed edilmiş "referanslar/" altındakileri silme
            if (!str_starts_with($reference->image_path, 'referanslar/')) {
                $this->deleteFile($reference->image_path);
            }
        }
        $name = $reference->name;
        $reference->delete();

        return back()->with('status', '"' . $name . '" silindi.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order'   => ['required', 'array'],
            'order.*' => ['integer'],
        ]);

        foreach ($data['order'] as $position => $id) {
            Reference::where('id', $id)->update(['sort' => $position + 1]);
        }

        return response()->json(['ok' => true]);
    }

    private function validateData(Request $request, bool $imageRequired): array
    {
        $rules = [
            'name'    => ['required', 'string', 'max:160'],
            'website' => ['nullable', 'string', 'max:255'],
            'sort'    => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => [
                $imageRequired ? 'required' : 'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp,svg',
                'max:4096',
            ],
        ];

        $data = $request->validate($rules);
        $data['is_active']        = $request->boolean('is_active');
        $data['show_on_kurumsal'] = $request->boolean('show_on_kurumsal');
        $data['sort']             = $data['sort'] ?? 0;
        unset($data['image_file_upload']);

        return $data;
    }

    private function handleImageUpload(Request $request, ?string $existingPath): ?string
    {
        if (! $request->hasFile('image_file_upload')) {
            return null;
        }

        if ($existingPath
            && !preg_match('#^https?://#', $existingPath)
            && !str_starts_with($existingPath, 'referanslar/')) {
            $this->deleteFile($existingPath);
        }

        return $request->file('image_file_upload')->store('referanslar', 'public');
    }

    private function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
