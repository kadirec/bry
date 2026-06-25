<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                // "Ayşe K."
            $table->string('role_text')->nullable();               // "Bireysel Program"
            $table->text('quote');                                 // alıntı
            $table->string('tag')->nullable();                     // "Bireysel" / "Online" / "Kurumsal"
            $table->string('duration', 10)->nullable();            // "0:47"
            $table->enum('color', ['plum','sage','peach','gold','ink'])->default('plum');
            $table->string('youtube_id', 32)->nullable();          // YouTube video ID (örn. jZwHCFFrNKA)
            $table->string('thumbnail')->nullable();               // opsiyonel özel thumbnail path
            $table->boolean('is_active')->default(true);
            $table->boolean('show_on_home')->default(true);        // anasayfada görünecek mi
            $table->unsignedInteger('sort')->default(0);
            $table->timestamps();

            $table->index(['is_active', 'sort']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
