<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\ProgramStudi;
use App\Models\SpesialisasiDosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::with(['programStudi', 'spesialisasi'])->paginate(10);
        return view('dosen.index', compact('dosens'));
    }

    public function create()
    {
        $programStudis = ProgramStudi::all();
        $spesialisasis = SpesialisasiDosen::all();
        return view('dosen.create', compact('programStudis', 'spesialisasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip',
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email',
            'program_studi_id' => 'required|exists:program_studis,id',
            'spesialisasi_id' => 'required|exists:spesialisasi_dosens,id',
        ]);

        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function edit(Dosen $dosen)
    {
        $programStudis = ProgramStudi::all();
        $spesialisasis = SpesialisasiDosen::all();
        return view('dosen.edit', compact('dosen', 'programStudis', 'spesialisasis'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([
            'nip' => 'required|unique:dosens,nip,' . $dosen->id,
            'nama' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $dosen->id,
            'program_studi_id' => 'required|exists:program_studis,id',
            'spesialisasi_id' => 'required|exists:spesialisasi_dosens,id',
        ]);

        $dosen->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diperbarui');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
