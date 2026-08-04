<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            // Mail gönderim durumu
            $table->string('mail_status', 16)->default('pending')->after('user_agent'); // pending|sent|failed|skipped
            $table->timestamp('mail_sent_at')->nullable()->after('mail_status');
            $table->unsignedSmallInteger('mail_attempts')->default(0)->after('mail_sent_at');
            $table->text('mail_last_error')->nullable()->after('mail_attempts');

            // PDF indirme takibi (yalnızca "Bilincinle Tanış" istekleri için doldurulur)
            $table->string('pdf_token', 64)->nullable()->unique()->after('mail_last_error');
            $table->unsignedInteger('pdf_download_count')->default(0)->after('pdf_token');
            $table->timestamp('pdf_first_downloaded_at')->nullable()->after('pdf_download_count');
            $table->timestamp('pdf_last_downloaded_at')->nullable()->after('pdf_first_downloaded_at');

            $table->index('mail_status');
        });
    }

    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropIndex(['mail_status']);
            $table->dropColumn([
                'mail_status', 'mail_sent_at', 'mail_attempts', 'mail_last_error',
                'pdf_token', 'pdf_download_count', 'pdf_first_downloaded_at', 'pdf_last_downloaded_at',
            ]);
        });
    }
};
