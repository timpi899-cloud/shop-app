<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Seed admin lewat seeder khusus
        $this->call([
            AdminUserSeeder::class,
        ]);

        // Seed user biasa, aman dari duplicate
        User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'Jhon Doe',
                'password' => Hash::make('123456'),
                'role' => 'user', 
                'phone' => '081234567890',
                'address' => 'Alamat User',
                'is_member' => true,
                'member_until' => now()->addYear(),
            ]
        );
    }
}
