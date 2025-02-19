<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisasiDosen extends Model {
    use HasFactory;
    protected $table = 'spesialisasi_dosens';
    protected $fillable = ['kode', 'nama'];
    public function dosens() { return $this->hasMany(Dosen::class); }
}
