<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SpesialisasiDosen;

class SpesialisasiDosenSeeder extends Seeder {
    public function run() {
        SpesialisasiDosen::create([
            'kode' => 'SE',
            'nama' => 'Software Engineering',
        ]);

        SpesialisasiDosen::create([
            'kode' => 'CS',
            'nama' => 'Computer Science',
        ]);
    }
}
