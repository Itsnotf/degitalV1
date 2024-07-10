<?php

namespace Database\Seeders;

use App\Models\pembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        pembayaran::create([
            'nama' => 'Dana',
            'nomer' => '08129232023',
            'an' => 'Faiz Aflah Hafizuddin',
            'jenis' => 'E-Wallet',
        ]);
        pembayaran::create([
            'nama' => 'Mandiri',
            'nomer' => '1232245612933921',
            'an' => 'Faiz Aflah Hafizuddin',
            'jenis' => 'Bank',
        ]);
    }
}
