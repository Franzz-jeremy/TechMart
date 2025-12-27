<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin
        User::create([
            'name' => 'Admin TechMart',
            'email' => 'admin@techmart.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Membuat Akun Contoh User Biasa
        User::create([
            'name' => 'Azis',
            'email' => 'azis@gmail.com',
            'password' => Hash::make('azis1234'),
            'role' => 'user',
        ]);
    }
}