<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ReferenceSeeder extends Seeder
{
    /**
     * storage/app/public/referanslar/ klasöründeki tüm logoları
     * `references` tablosuna kaydeder. Aynı dosya yolu için tekrar etmez.
     */
    public function run(): void
    {
        $disk = Storage::disk('public');
        if (! $disk->exists('referanslar')) {
            $this->command?->warn('referanslar/ klasörü bulunamadı.');
            return;
        }

        $files = collect($disk->files('referanslar'))
            ->filter(fn ($f) => preg_match('/\.(png|jpg|jpeg|webp|svg)$/i', $f))
            ->values();

        $maxSort = (int) Reference::max('sort');
        $created = 0;
        $skipped = 0;

        foreach ($files as $file) {
            if (Reference::where('image_path', $file)->exists()) {
                $skipped++;
                continue;
            }

            $base = pathinfo($file, PATHINFO_FILENAME);
            $name = $this->prettify($base);
            $maxSort++;

            Reference::create([
                'name'       => $name,
                'image_path' => $file,
                'is_active'  => true,
                'sort'       => $maxSort,
            ]);
            $created++;
        }

        $this->command?->info("ReferenceSeeder: {$created} yeni eklendi, {$skipped} mevcuttu.");
    }

    private function prettify(string $base): string
    {
        $clean = str_replace(['_', '-'], ' ', $base);
        $clean = preg_replace('/\s+/', ' ', trim($clean));

        // Kısa kısaltmalar/UPPER bırak (örn. "hm" → "HM", "itu" → "İTÜ" değil ama "ITU")
        $map = [
            'hm'   => 'HM',
            'bp'   => 'BP',
            'itu'  => 'İTÜ',
            'odtu' => 'ODTÜ',
            'uni'  => 'Üniversitesi',
            'unv'  => 'Üniversitesi',
        ];

        $parts = array_map(function ($w) use ($map) {
            $lw = mb_strtolower($w, 'UTF-8');
            return $map[$lw] ?? Str::ucfirst($lw);
        }, explode(' ', $clean));

        return implode(' ', $parts);
    }
}
