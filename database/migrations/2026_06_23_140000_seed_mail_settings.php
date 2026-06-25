<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $defaults = [
            // [group, key, type, label, value, sort, hint]
            ['mail', 'mail_from_address', 'email',    'Gönderici E-posta',  'info@bilincliritmikyasam.com', 1, 'Form onay e-postalarının gönderildiği adres.'],
            ['mail', 'mail_from_name',    'text',     'Gönderici Adı',      'Bilinçli Ritmik Yaşam',         2, 'E-postada görünen ad.'],
            ['mail', 'mail_reply_to',     'email',    'Yanıt Adresi',       'info@bilincliritmikyasam.com', 3, 'Boş bırakılırsa gönderici adresi kullanılır.'],
            ['mail', 'mail_host',         'text',     'SMTP Host',          'smtp.gmail.com',                4, 'Örn: smtp.gmail.com, smtp.office365.com'],
            ['mail', 'mail_port',         'text',     'SMTP Port',          '587',                           5, 'TLS: 587 · SSL: 465'],
            ['mail', 'mail_username',     'text',     'SMTP Kullanıcı Adı', '',                              6, null],
            ['mail', 'mail_password',     'password', 'SMTP Şifre',         '',                              7, 'App password / SMTP key.'],
            ['mail', 'mail_encryption',   'text',     'Şifreleme',          'tls',                           8, 'tls · ssl · null'],
            ['mail', 'mail_enabled',      'boolean',  'Onay E-postası',     '1',                             9, '1: gönderim aktif · 0: kapalı'],
        ];

        foreach ($defaults as [$group, $key, $type, $label, $value, $sort, $hint]) {
            Setting::updateOrCreate(
                ['key' => $key],
                compact('group', 'type', 'label', 'value', 'sort', 'hint')
            );
        }
    }

    public function down(): void
    {
        Setting::where('group', 'mail')->delete();
    }
};
