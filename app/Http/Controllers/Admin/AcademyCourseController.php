<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademyCourse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AcademyCourseController extends Controller
{
    public function index(): View
    {
        return view('admin.academy.index', [
            'courses' => AcademyCourse::ofType(AcademyCourse::TYPE_COURSE)->ordered()->get(),
            'lives'   => AcademyCourse::ofType(AcademyCourse::TYPE_LIVE)->ordered()->get(),
        ]);
    }

    public function create(Request $request): View
    {
        $type = $request->query('type') === AcademyCourse::TYPE_LIVE
            ? AcademyCourse::TYPE_LIVE
            : AcademyCourse::TYPE_COURSE;

        return view('admin.academy.form', [
            'item' => new AcademyCourse([
                'type'       => $type,
                'badge'      => 'live',
                'link_label' => $type === AcademyCourse::TYPE_LIVE ? 'Detaylar' : 'Eğitimi İncele',
                'is_active'  => true,
                'sort'       => (int) AcademyCourse::ofType($type)->max('sort') + 1,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_file_upload')) {
            $data['image_path'] = $request->file('image_file_upload')->store('online-akademi', 'public');
        }

        AcademyCourse::create($data);

        return redirect()->route('admin.academy.index')->with('status', 'Eğitim eklendi.');
    }

    public function edit(AcademyCourse $academyCourse): View
    {
        return view('admin.academy.form', ['item' => $academyCourse]);
    }

    public function update(Request $request, AcademyCourse $academyCourse): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('image_file_upload')) {
            $this->deleteUploadedImage($academyCourse);
            $data['image_path'] = $request->file('image_file_upload')->store('online-akademi', 'public');
        } elseif ($request->boolean('remove_image')) {
            $this->deleteUploadedImage($academyCourse);
            $data['image_path'] = null;
        }

        $academyCourse->update($data);

        return redirect()->route('admin.academy.index')->with('status', 'Eğitim güncellendi.');
    }

    public function destroy(AcademyCourse $academyCourse): RedirectResponse
    {
        $this->deleteUploadedImage($academyCourse);
        $academyCourse->delete();

        return back()->with('status', 'Eğitim silindi.');
    }

    public function reorder(Request $request): JsonResponse
    {
        $data = $request->validate([
            'order'   => ['required', 'array'],
            'order.*' => ['integer'],
        ]);

        foreach ($data['order'] as $pos => $id) {
            AcademyCourse::where('id', $id)->update(['sort' => $pos + 1]);
        }

        return response()->json(['ok' => true]);
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'type'       => ['required', 'in:course,live'],
            'title'      => ['required', 'string', 'max:180'],
            'title_note' => ['nullable', 'string', 'max:80'],
            'quote'      => ['nullable', 'string', 'max:300'],
            'body'       => ['nullable', 'string', 'max:5000'],
            'badge'      => ['required', 'in:live,soon,none'],
            'link_url'   => ['nullable', 'string', 'max:255'],
            'link_label' => ['nullable', 'string', 'max:80'],
            'sort'       => ['nullable', 'integer', 'min:0'],
            'image_file_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:8192'],
        ]);

        unset($data['image_file_upload']);

        $data['show_seal'] = $request->boolean('show_seal');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort']      = $data['sort'] ?? 0;

        return $data;
    }

    private function deleteUploadedImage(AcademyCourse $item): void
    {
        $path = $item->image_path;
        // Sadece panelden yüklenenleri sil; repodaki statik görselleri koru
        if ($path
            && str_starts_with($path, 'online-akademi/')
            && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
