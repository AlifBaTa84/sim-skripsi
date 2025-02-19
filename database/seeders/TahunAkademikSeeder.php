<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TahunAkademik;

class TahunAkademikSeeder extends Seeder {
    public function run() {
        TahunAkademik::create([
            'kode' => 'TA2023G1',
            'tahun_akademik' => '2023/2024',
            'semester' => 'Ganjil',
        ]);

        TahunAkademik::create([
            'kode' => 'TA2023G2',
            'tahun_akademik' => '2023/2024',
            'semester' => 'Genap',
        ]);
    }
}
