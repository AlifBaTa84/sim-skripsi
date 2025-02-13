<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpesialisasiDosen extends Model {
    protected $fillable = ['kode', 'nama'];
    public function dosens() { return $this->hasMany(Dosen::class); }
}
