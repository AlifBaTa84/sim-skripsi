<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model {
    protected $fillable = ['kode', 'nama'];
    public function dosens() { return $this->hasMany(Dosen::class); }
    public function mahasiswas() { return $this->hasMany(Mahasiswa::class); }
}
