<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('product_slug', 100)->index();
            $table->string('name', 120);
            $table->string('phone', 32);
            $table->text('message');
            $table->boolean('is_approved')->default(false)->index();
            $table->boolean('kvkk_accepted')->default(false);
            $table->unsignedInteger('sort')->default(0);
            $table->string('ip', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamps();

            $table->index(['product_slug', 'is_approved', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
