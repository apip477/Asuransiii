<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Tambahkan ini jika Anda ingin membuat user di sini

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil AdminUserSeeder.php untuk membuat user admin.
        // Asumsi: File AdminUserSeeder.php sudah ada dan benar.
        $this->call(AdminUserSeeder::class); 

        // 1. Contoh User Biasa (Menggunakan Factory untuk data dummy)
        // User::factory(10)->create(); 

        // 2. User Test yang eksplisit (Bisa digunakan untuk testing)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345'), // Tambahkan password agar bisa login
        ]);

         //Opsional: Buat user Admin di sini jika Anda tidak menggunakan AdminUserSeeder
        
        //User::create([
            //'name' => 'Admin Savannah',
            //'email' => 'admin@example.com',
            //'password' => Hash::make('password'),
            //'role' => 'admin', // Pastikan kolom 'role' ada di tabel 'users'
        
        
    }
}