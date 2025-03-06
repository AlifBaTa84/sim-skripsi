<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAkademik;

class TahunAkademikController extends Controller {
    public function index() {
        $data = TahunAkademik::paginate(10);
        return view('admin/tahun_akademik.index', compact('data'));
    }

    public function create() {
        return view('admin/tahun_akademik.create');
    }

    public function store(Request $request) {
        $request->validate([
            'tahun_akademik' => 'required|string',
            'semester' => 'required|in:Ganjil,Genap',
        ]);

        // Generate kode otomatis
        $lastRecord = TahunAkademik::latest()->first();
        $newKode = 'TA' . substr($request->tahun_akademik, 2, 2) . ($request->semester == 'Ganjil' ? 'G1' : 'G2');

        TahunAkademik::create([
            'kode' => $newKode,
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin/tahun_akademik.index')->with('success', 'Tahun Akademik berhasil ditambahkan.');
    }

    public function edit(TahunAkademik $tahunAkademik) {
        return view('admin/tahun_akademik.edit', compact('tahunAkademik'));
    }

    public function update(Request $request, TahunAkademik $tahunAkademik) {
        $request->validate([
            'tahun_akademik' => 'required|string',
            'semester' => 'required|in:Ganjil,Genap',
        ]);

        $tahunAkademik->update([
            'tahun_akademik' => $request->tahun_akademik,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin/tahun_akademik.index')->with('success', 'Tahun Akademik berhasil diperbarui.');
    }

    public function destroy(TahunAkademik $tahunAkademik) {
        $tahunAkademik->delete();
        return redirect()->route('admin/tahun_akademik.index')->with('success', 'Tahun Akademik berhasil dihapus.');
    }
}