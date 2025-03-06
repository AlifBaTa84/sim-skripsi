<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpesialisasiDosen;

class SpesialisasiDosenController extends Controller {
    public function index() {
        $spesialisasi = SpesialisasiDosen::paginate(10);
        return view('admin/spesialisasi_dosen.index', compact('spesialisasi'));
    }

    public function create() {
        return view('admin/spesialisasi_dosen.create');
    }

    public function store(Request $request) {
        $request->validate([
            'kode' => 'required|unique:spesialisasi_dosens,kode',
            'nama' => 'required'
        ]);

        SpesialisasiDosen::create($request->all());

        return redirect()->route('admin/spesialisasi_dosen.index')->with('success', 'Data spesialisasi dosen berhasil ditambahkan');
    }

    public function edit(SpesialisasiDosen $spesialisasiDosen) {
        return view('admin/spesialisasi_dosen.edit', compact('spesialisasiDosen'));
    }

    public function update(Request $request, SpesialisasiDosen $spesialisasiDosen) {
        $request->validate([
            'kode' => 'required|unique:spesialisasi_dosens,kode,' . $spesialisasiDosen->id,
            'nama' => 'required'
        ]);

        $spesialisasiDosen->update($request->all());

        return redirect()->route('admin/spesialisasi_dosen.index')->with('success', 'Data spesialisasi dosen berhasil diperbarui');
    }

    public function destroy(SpesialisasiDosen $spesialisasiDosen) {
        $spesialisasiDosen->delete();

        return redirect()->route('admin/spesialisasi_dosen.index')->with('success', 'Data spesialisasi dosen berhasil dihapus');
    }
}
