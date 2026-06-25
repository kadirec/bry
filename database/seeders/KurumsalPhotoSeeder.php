<?php

namespace Database\Seeders;

use App\Models\KurumsalPhoto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class KurumsalPhotoSeeder extends Seeder
{
    /**
     * storage/app/public/kurumsal-etkinlikler/ klasöründeki tüm fotoğrafları
     * dosya adındaki numaraya göre sıralayıp DB'ye ekler.
     */
    public function run(): void
    {
        $disk = Storage::disk('public');
        if (! $disk->exists('kurumsal-etkinlikler')) {
            $this->command?->warn('kurumsal-etkinlikler/ klasörü bulunamadı.');
            return;
        }

        $files = collect($disk->files('kurumsal-etkinlikler'))
            ->filter(fn ($f) => preg_match('/\.(png|jpg|jpeg|webp)$/i', $f))
            ->sort(function ($a, $b) {
                // Dosya adındaki sayıyı çıkar, ona göre sırala (kurumsal-1, kurumsal-2, ...)
                preg_match('/(\d+)(?=\.[a-z]+$)/i', basename($a), $ma);
                preg_match('/(\d+)(?=\.[a-z]+$)/i', basename($b), $mb);
                $na = isset($ma[1]) ? (int) $ma[1] : 999999;
                $nb = isset($mb[1]) ? (int) $mb[1] : 999999;
                return $na <=> $nb;
            })
            ->values();

        $maxSort = (int) KurumsalPhoto::max('sort');
        $created = 0;
        $skipped = 0;

        foreach ($files as $file) {
            if (KurumsalPhoto::where('image_path', $file)->exists()) {
                $skipped++;
                continue;
            }
            $maxSort++;
            KurumsalPhoto::create([
                'image_path' => $file,
                'caption'    => null,
                'sort'       => $maxSort,
                'is_active'  => true,
            ]);
            $created++;
        }

        $this->command?->info("KurumsalPhotoSeeder: {$created} yeni eklendi, {$skipped} mevcuttu.");
    }
}
