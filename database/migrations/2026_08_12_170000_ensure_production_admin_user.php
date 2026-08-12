<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Canlıda admin girişi yapılamıyordu (kullanıcı yok / şifre bilinmiyor).
 * Sunucuda kabuk erişimi olmadığı için hesabı deploy hattı üzerinden kuruyoruz:
 * deploy.yml her push'ta `php artisan migrate --force` çalıştırıyor.
 *
 * Şifre repoya düz metin girmesin diye yalnızca bcrypt hash'i tutuluyor;
 * açık hâli hesabı isteyen kişiye ayrıca iletildi.
 */
return new class extends Migration
{
    private const EMAIL = 'admin@bilincliritmikyasam.com';

    private const PASSWORD_HASH = '$2y$12$n1A8bmboFbCK6Zx3/Lnt4OPyQt.hqe5ktjXy5SZFu.9gjIjUgmr66';

    public function up(): void
    {
        $now = now();

        $existingId = DB::table('users')->where('email', self::EMAIL)->value('id');

        if ($existingId !== null) {
            // Hesap var ama giriş yapılamıyor → şifreyi ve admin yetkisini bilinen hâle getir.
            DB::table('users')->where('id', $existingId)->update([
                'password'   => self::PASSWORD_HASH,
                'is_admin'   => true,
                'updated_at' => $now,
            ]);

            return;
        }

        DB::table('users')->insert([
            'name'              => 'BRY Admin',
            'email'             => self::EMAIL,
            'password'          => self::PASSWORD_HASH,
            'is_admin'          => true,
            'email_verified_at' => $now,
            'created_at'        => $now,
            'updated_at'        => $now,
        ]);
    }

    public function down(): void
    {
        // Kasıtlı olarak boş: rollback'te canlıdaki tek yönetici hesabını silmek,
        // panele erişimi tamamen kapatır. Hesabı kaldırmak gerekirse elle yapılmalı.
    }
};
