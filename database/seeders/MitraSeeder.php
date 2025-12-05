<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mitras = [
            [
                'name' => 'Bank Jatim',
                'description' => 'Bank Jawa Timur',
                'image' => 'mitra/bank_jatim.png',
                'category' => 'bank',
            ],
            [
                'name' => 'BCA',
                'description' => 'Bank Central Asia',
                'image' => 'mitra/bca.png',
                'category' => 'bank',
            ],
            [
                'name' => 'BNI',
                'description' => 'Bank Negara Indonesia',
                'image' => 'mitra/bni.png',
                'category' => 'bank',
            ],
            [
                'name' => 'BRI',
                'description' => 'Bank Rakyat Indonesia',
                'image' => 'mitra/bri.png',
                'category' => 'bank',
            ],
            [
                'name' => 'BTN',
                'description' => 'Bank Tabungan Negara',
                'image' => 'mitra/btn.png',
                'category' => 'bank',
            ],
            [
                'name' => 'Bukopoin',
                'description' => 'Bukopoin',
                'image' => 'mitra/bukopoin.png',
                'category' => 'bank',
            ],
            [
                'name' => 'Exim Bank',
                'description' => 'Bank Ekspor Impor Indonesia',
                'image' => 'mitra/exim.png',
                'category' => 'bank',
            ],
            [
                'name' => 'JTrust',
                'description' => 'JTrust Bank',
                'image' => 'mitra/jtrust.png',
                'category' => 'bank',
            ],
            [
                'name' => 'Mandiri',
                'description' => 'Bank Mandiri',
                'image' => 'mitra/mandri.png',
                'category' => 'bank',
            ],
        ];

        foreach ($mitras as $mitra) {
            Mitra::create($mitra);
        }
    }
}
