<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class ProgramStudiSeeder extends Seeder
{
    public function run()
    {
        DB::table('program_studis')->insert([
            ['kode' => 'IF', 'nama' => 'Teknik Informatika'],
            ['kode' => 'SI', 'nama' => 'Sistem Informasi']
        ]);
    }
}
