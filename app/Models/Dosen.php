<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model {
    protected $fillable = ['nip', 'nama', 'email', 'program_studi_id', 'spesialisasi_id'];
    public function programStudi() { return $this->belongsTo(ProgramStudi::class); }
    public function spesialisasi() { return $this->belongsTo(SpesialisasiDosen::class); }
}
