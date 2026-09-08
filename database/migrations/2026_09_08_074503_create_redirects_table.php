<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('redirects', function (Blueprint $table) {
            $table->id();
            $table->string('from_path', 500)->unique();
            $table->string('to_path', 500);
            $table->unsignedSmallInteger('status_code')->default(301);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('hits')->default(0);
            $table->timestamp('last_hit_at')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        $now = now();
        $rows = [
            ['/bry_nedir',                                            '/bry-nedir'],
            ['/bry-metodu-egitimi-web',                               '/bry-metodu-egitimi'],
            ['/Tuncay_Vural',                                         '/tuncay-vural'],
            ['/store',                                                '/bry-online-akademi'],
            ['/blog/tuncay-vural-dan-dans-ve-yasam-sohbetleri-gosterisi', '/blog/tuncay-vuraldan-dans-ve-yasam-sohbetleri-gosterisi'],
            ['/contact',                                              '/iletisim'],
            ['/blog/degersizlik-duygusu',                             '/blog/degersizlik-duygusu-ve-hissi-ile-basa-cikma-rehberi'],
            ['/referanslar',                                          '/bry-ile-donusen-hayatlar'],
            ['/bry-egitim-kendini-kesfet',                            '/bry-metodu-egitimi'],
            ['/bry-metodu-nedir',                                     '/bry-nedir'],
            ['/aile',                                                 '/bry-bireysel-ve-ozel-programlar'],
            ['/resource_redirect/landing_pages/2151593648',           '/bry-metodu-egitimi'],
            ['/foto-galeri',                                          '/etkinlik-ve-kamp'],
        ];

        foreach ($rows as $row) {
            DB::table('redirects')->updateOrInsert(
                ['from_path' => $row[0]],
                [
                    'to_path'     => $row[1],
                    'status_code' => 301,
                    'is_active'   => true,
                    'note'        => '301 yönlendirme',
                    'created_at'  => $now,
                    'updated_at'  => $now,
                ]
            );
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('redirects');
    }
};
