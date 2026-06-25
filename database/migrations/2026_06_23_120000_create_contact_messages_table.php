<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 32);
            $table->string('subject')->nullable();
            $table->text('message')->nullable();
            $table->string('source_url', 500)->nullable();
            $table->string('source_label', 80)->nullable();
            $table->boolean('kvkk_accepted')->default(false);
            $table->enum('status', ['new', 'in_progress', 'done', 'archived'])->default('new');
            $table->text('notes')->nullable();
            $table->string('ip', 45)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
