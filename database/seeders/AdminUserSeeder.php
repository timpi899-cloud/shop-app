<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // cek dulu kalau email sudah ada, biar nggak duplicate
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'), // jangan lupa ganti
                'role' => 'admin',
                'phone' => '081234567890',
                'address' => 'Alamat Admin',
                'is_member' => true,
                'member_until' => now()->addYear(),
            ]);
        }
    }
}
