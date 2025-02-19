<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpesialisasiDosen;

class SpesialisasiDosenController extends Controller {
    public function index() {
        $spesialisasi = SpesialisasiDosen::paginate(10);
        return view('spesialisasi_dosen.index', compact('spesialisasi'));
    }

    public function create() {
        return view('spesialisasi_dosen.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode' => 'required|unique:spesialisasi_dosens,kode',
            'nama' => 'required'
        ]);

        SpesialisasiDosen::create($request->all());

        return redirect()->route('spesialisasi_dosen.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(SpesialisasiDosen $spesialisasiDosen) {
        return view('spesialisasi_dosen.edit', compact('spesialisasiDosen'));
    }

    public function update(Request $request, SpesialisasiDosen $spesialisasiDosen) {
        $request->validate([
            'kode' => 'required|unique:spesialisasi_dosens,kode,' . $spesialisasiDosen->id,
            'nama' => 'required'
        ]);

        $spesialisasiDosen->update($request->all());

        return redirect()->route('spesialisasi_dosen.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(SpesialisasiDosen $spesialisasiDosen) {
        $spesialisasiDosen->delete();

        return redirect()->route('spesialisasi_dosen.index')->with('success', 'Data berhasil dihapus');
    }
}
