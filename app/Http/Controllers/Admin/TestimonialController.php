<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        return view('admin.testimonials.index', [
            'items' => Testimonial::orderBy('sort')->orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.testimonials.form', [
            'item' => new Testimonial([
                'color'        => 'plum',
                'is_active'    => true,
                'show_on_home' => true,
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        if ($upload = $this->handleVideoUpload($request, null)) {
            $data['video_file'] = $upload['path'];
            $data['video_mime'] = $upload['mime'];
        }

        if ($thumb = $this->handleThumbnailUpload($request, null)) {
            $data['thumbnail'] = $thumb;
        }

        Testimonial::create($data);
        return redirect()->route('admin.testimonials.index')
            ->with('status', '"' . $data['name'] . '" hikayesi eklendi.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', ['item' => $testimonial]);
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $data = $this->validateData($request);

        if ($upload = $this->handleVideoUpload($request, $testimonial->video_file)) {
            $data['video_file'] = $upload['path'];
            $data['video_mime'] = $upload['mime'];
        }
        if ($request->boolean('remove_video') && $testimonial->video_file) {
            $this->deleteFile($testimonial->video_file);
            $data['video_file'] = null;
            $data['video_mime'] = null;
        }

        if ($thumb = $this->handleThumbnailUpload($request, $testimonial->thumbnail)) {
            $data['thumbnail'] = $thumb;
        }
        if ($request->boolean('remove_thumbnail') && $testimonial->thumbnail) {
            $this->deleteFile($testimonial->thumbnail);
            $data['thumbnail'] = null;
        }

        $testimonial->update($data);
        return redirect()->route('admin.testimonials.index')
            ->with('status', '"' . $testimonial->name . '" güncellendi.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        if ($testimonial->video_file) {
            $this->deleteFile($testimonial->video_file);
        }
        if ($testimonial->thumbnail && !preg_match('#^https?://#', $testimonial->thumbnail)) {
            $this->deleteFile($testimonial->thumbnail);
        }
        $name = $testimonial->name;
        $testimonial->delete();
        return back()->with('status', '"' . $name . '" silindi.');
    }

    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'name'         => ['required', 'string', 'max:120'],
            'tag'          => ['nullable', 'string', 'max:40'],
            'duration'     => ['nullable', 'string', 'max:10'],
            'youtube_id'   => ['nullable', 'string', 'max:200'],
            'sort'         => ['nullable', 'integer', 'min:0'],
            'video_file_upload'     => ['nullable', 'file', 'mimetypes:video/mp4,video/webm,video/quicktime,video/x-m4v', 'max:122880'],
            'thumbnail_file_upload' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $data['is_active']    = $request->boolean('is_active');
        $data['show_on_home'] = $request->boolean('show_on_home');
        $data['sort']         = $data['sort'] ?? 0;
        $data['quote']        = '';

        if (!empty($data['youtube_id'])) {
            $data['youtube_id'] = $this->extractYoutubeId($data['youtube_id']);
        }

        unset($data['video_file_upload'], $data['thumbnail_file_upload']);
        return $data;
    }

    private function handleThumbnailUpload(Request $request, ?string $existingPath): ?string
    {
        if (! $request->hasFile('thumbnail_file_upload')) {
            return null;
        }

        if ($existingPath && !preg_match('#^https?://#', $existingPath)) {
            $this->deleteFile($existingPath);
        }

        return $request->file('thumbnail_file_upload')->store('testimonials/posters', 'public');
    }

    private function handleVideoUpload(Request $request, ?string $existingPath): ?array
    {
        if (! $request->hasFile('video_file_upload')) {
            return null;
        }

        if ($existingPath) {
            $this->deleteFile($existingPath);
        }

        $file = $request->file('video_file_upload');
        $path = $file->store('testimonials', 'public');

        return [
            'path' => $path,
            'mime' => $file->getMimeType(),
        ];
    }

    private function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    private function extractYoutubeId(string $raw): string
    {
        $patterns = [
            '#youtu\.be/([A-Za-z0-9_-]{6,32})#',
            '#youtube\.com/watch\?v=([A-Za-z0-9_-]{6,32})#',
            '#youtube\.com/embed/([A-Za-z0-9_-]{6,32})#',
            '#youtube\.com/shorts/([A-Za-z0-9_-]{6,32})#',
        ];
        foreach ($patterns as $p) {
            if (preg_match($p, $raw, $m)) {
                return $m[1];
            }
        }
        return preg_match('/^[A-Za-z0-9_-]{6,32}$/', $raw) ? $raw : '';
    }
}
