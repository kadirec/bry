<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('show_on_home')->default(false)->after('is_featured');
            $table->unsignedInteger('home_sort')->default(0)->after('show_on_home');
            $table->index(['show_on_home', 'home_sort']);
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['show_on_home', 'home_sort']);
            $table->dropColumn(['show_on_home', 'home_sort']);
        });
    }
};
