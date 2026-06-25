<?php

namespace Database\Seeders;

use App\Models\GalleryPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class GalleryPhotoSeeder extends Seeder
{
    /**
     * storage/app/public/etkinlik-kamp/ klasöründeki tüm fotoğrafları
     * dosya adındaki numaraya göre sıralayıp DB'ye ekler.
     */
    public function run(): void
    {
        $disk = Storage::disk('public');
        if (! $disk->exists('etkinlik-kamp')) {
            $this->command?->warn('etkinlik-kamp/ klasörü bulunamadı.');
            return;
        }

        $files = collect($disk->files('etkinlik-kamp'))
            ->filter(fn ($f) => preg_match('/\.(png|jpg|jpeg|webp)$/i', $f))
            ->sort(function ($a, $b) {
                // Dosya adındaki sayıyı çıkar, ona göre sırala (etkinlik1, etkinlik2, ... etkinlik39)
                preg_match('/(\d+)(?=\.[a-z]+$)/i', basename($a), $ma);
                preg_match('/(\d+)(?=\.[a-z]+$)/i', basename($b), $mb);
                $na = isset($ma[1]) ? (int) $ma[1] : 999999;
                $nb = isset($mb[1]) ? (int) $mb[1] : 999999;
                return $na <=> $nb;
            })
            ->values();

        $maxSort = (int) GalleryPhoto::max('sort');
        $created = 0;
        $skipped = 0;

        foreach ($files as $file) {
            if (GalleryPhoto::where('image_path', $file)->exists()) {
                $skipped++;
                continue;
            }
            $maxSort++;
            GalleryPhoto::create([
                'image_path' => $file,
                'caption'    => null,
                'sort'       => $maxSort,
                'is_active'  => true,
            ]);
            $created++;
        }

        $this->command?->info("GalleryPhotoSeeder: {$created} yeni eklendi, {$skipped} mevcuttu.");
    }
}
