<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bilincliritmikyasam.com'],
            [
                'name'     => 'BRY Admin',
                'password' => Hash::make('bry-admin-2026'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}
