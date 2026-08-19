<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // CSS object-position değeri: "50% 50%" (yatay% dikey%)
            $table->string('image_position', 20)->default('50% 50%')->after('featured_image');
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('image_position');
        });
    }
};
