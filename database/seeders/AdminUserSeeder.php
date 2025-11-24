<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Akun Admin PT Savanaah Jaya Utama
        User::create([
            'name' => 'Admin PT SJU Utama', 
            'email' => 'admin@sju.com', // Email Login
            'password' => Hash::make('password'), // Password Default: password
            'role' => 'admin', // Role Admin
        ]);
        
        // Membuat Akun User Biasa (Opsional)
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@sju.com', 
            'password' => Hash::make('password'), 
            'role' => 'user', 
        ]);
    }
}