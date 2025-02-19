<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;

    protected $table = 'tahun_akademiks'; // Pastikan nama tabel sudah benar

    protected $fillable = [
        'kode', // Tambahkan kode agar bisa diisi secara massal
        'tahun_akademik',
        'semester',
    ];
}
