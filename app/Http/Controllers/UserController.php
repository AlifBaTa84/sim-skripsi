<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $dosen = Dosen::select('nip', 'nama')->get(); // Ambil NIP & Nama Dosen
        $mahasiswa = Mahasiswa::select('nim', 'nama')->get(); // Ambil NIM & Nama Mahasiswa
        return view('users.create', compact('dosen', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|in:admin,dosen,mahasiswa',
            'email' => 'nullable|required_if:role,admin|email|unique:users,email',
            'nip' => 'nullable|required_if:role,dosen|exists:dosen,nip|unique:users,nip',
            'nim' => 'nullable|required_if:role,mahasiswa|exists:mahasiswa,nim|unique:users,nim',
            'password' => 'required|min:6|confirmed',
        ]);
    
        User::create([
            'email' => $request->email,
            'role' => $request->role,
            'nip' => $request->role === 'dosen' ? $request->nip : null,
            'nim' => $request->role === 'mahasiswa' ? $request->nim : null,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:admin,dosen,mahasiswa',
            'nip' => 'nullable|unique:users,nip,' . $user->id . '|required_if:role,dosen',
            'nim' => 'nullable|unique:users,nim,' . $user->id . '|required_if:role,mahasiswa',
        ]);

        $user->update([
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
            'nip' => $request->role === 'dosen' ? $request->nip : null,
            'nim' => $request->role === 'mahasiswa' ? $request->nim : null,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}