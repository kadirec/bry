<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academy_courses', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('course');   // course | live
            $table->string('title');
            $table->string('title_note')->nullable();    // "Yetişkinler", "Gençler"
            $table->string('quote')->nullable();         // canlı yayın kartındaki alıntı
            $table->string('image_path')->nullable();
            $table->text('body')->nullable();            // boş satırla ayrılmış paragraflar
            $table->string('badge')->default('live');    // live | soon | none
            $table->boolean('show_seal')->default(false);
            $table->string('link_url')->nullable();
            $table->string('link_label')->nullable();
            $table->unsignedInteger('sort')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['type', 'is_active', 'sort']);
        });

        $now = now();
        DB::table('academy_courses')->insert([
            [
                'type'       => 'course',
                'title'      => 'BRY Metodu *Eğitimi*',
                'title_note' => 'Yetişkinler',
                'quote'      => null,
                'image_path' => 'assets/images/online_akademi/beymethodu_akademi.png',
                'body'       => "BRY Eğitimi, kendini bütünsel olarak tanımanı ve bu bilgiyi yaşamına adım adım uygulamanı sağlayan 4 haftalık sistemli bir eğitim sürecidir.\n\nKendi hızında ilerleyebilir, öğrendiklerini günlük yaşamına adım adım entegre edebilirsin.\n\nCanlı yayınlarla süreci pekiştirerek aklındaki sorulara netlik kazandırabilirsin.",
                'badge'      => 'live',
                'show_seal'  => true,
                'link_url'   => '/bry-methodu-egitimi',
                'link_label' => 'Eğitimi İncele',
                'sort'       => 1,
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type'       => 'course',
                'title'      => 'BRY Metodu ile *Gerçek Ben* Eğitimi',
                'title_note' => null,
                'quote'      => null,
                'image_path' => 'assets/images/online_akademi/gercekben_akademi.png',
                'body'       => "Çevrendeki kişilerin etkisinden sıyrılarak, öz değerlerini fark etmeni, anlamanı ve hayatına katabilmeni sağlayan bir eğitimdir.\n\nBu eğitimde zihninin nasıl işlediğini fark eder, seni sen yapan karakter değerlerini tanır ve kişiliğini bu değerlere göre, \"gerçek sen\" olarak yeniden şekillendirmeyi öğrenirsin.\n\nEğitim sonunda, sana özel karakter değerlerini ve zihinsel işleyişini tanımış olacak; böylece yaşam amaçların doğrultusunda zihnini daha etkili kullanmayı öğrenmiş olacaksın. Gerçek Ben Eğitimi, kısa sürede yüksek farkındalık kazandıran, etkili ve verimliliği yüksek bir eğitimdir.",
                'badge'      => 'live',
                'show_seal'  => false,
                'link_url'   => '/gercek-ben-egitimi',
                'link_label' => 'Eğitimi İncele',
                'sort'       => 2,
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type'       => 'course',
                'title'      => 'BRY Metodu *Eğitimi*',
                'title_note' => 'Gençler',
                'quote'      => null,
                'image_path' => 'assets/images/online_akademi/brymethodu_gencler.png',
                'body'       => 'Genç bireylerin kendini tanıma, karakter gelişimi ve yaşam yönünü daha bilinçli belirleyebilmesi için hazırlanan bu eğitim, yakında erişime açılacaktır.',
                'badge'      => 'soon',
                'show_seal'  => false,
                'link_url'   => null,
                'link_label' => 'Yakında Erişime Açılacak',
                'sort'       => 3,
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type'       => 'live',
                'title'      => 'Erteleme Alışkanlığı',
                'title_note' => null,
                'quote'      => 'Ertelemek, karakter özelliğin *değil*; yönetebileceğin bir alışkanlıktır.',
                'image_path' => null,
                'body'       => 'BRY Metodu ile bu alışkanlığın nedenlerini fark edecek, nasıl kontrol altına alabileceğini öğreneceksin.',
                'badge'      => 'live',
                'show_seal'  => false,
                'link_url'   => null,
                'link_label' => 'Detaylar',
                'sort'       => 1,
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type'       => 'live',
                'title'      => 'Özgüven',
                'title_note' => null,
                'quote'      => 'Özgüven eksikliği bir karakter özelliği *değil*; edinilmiş bir durumdur.',
                'image_path' => null,
                'body'       => 'Bu eğitimde, özgüveninin neden azaldığını fark edecek ve nasıl güçlendireceğini öğreneceksin.',
                'badge'      => 'live',
                'show_seal'  => false,
                'link_url'   => null,
                'link_label' => 'Detaylar',
                'sort'       => 2,
                'is_active'  => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('academy_courses');
    }
};
