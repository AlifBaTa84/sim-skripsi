<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramStudi;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $programStudi = ProgramStudi::all();
        return view('program_studi.index', compact('programStudi'));
    }

    public function create()
    {
        return view('program_studi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:program_studis,kode',
            'nama' => 'required'
        ]);

        ProgramStudi::create($request->all());
        return redirect()->route('program_studi.index')->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        return view('program_studi.edit', compact('programStudi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        $programStudi = ProgramStudi::findOrFail($id);
        $programStudi->update($request->all());

        return redirect()->route('program_studi.index')->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $programStudi = ProgramStudi::findOrFail($id);
        $programStudi->delete();

        return redirect()->route('program_studi.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}