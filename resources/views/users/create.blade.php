@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah User</h2>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select name="role" id="role" class="form-select" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
        </div>

        <!-- Input Email (hanya untuk Admin) -->
        <div class="mb-3" id="emailField" style="display: none;">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <!-- Input NIP (hanya untuk Dosen) -->
        <div class="mb-3" id="nipField" style="display: none;">
            <label for="nip" class="form-label">NIP</label>
            <select name="nip" id="nip" class="form-select">
                <option value="">-- Pilih NIP --</option>
                @foreach($dosen as $d)
                    <option value="{{ $d->nip }}">{{ $d->nip }} - {{ $d->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Input NIM (hanya untuk Mahasiswa) -->
        <div class="mb-3" id="nimField" style="display: none;">
            <label for="nim" class="form-label">NIM</label>
            <select name="nim" id="nim" class="form-select">
                <option value="">-- Pilih NIM --</option>
                @foreach($mahasiswa as $m)
                    <option value="{{ $m->nim }}">{{ $m->nim }} - {{ $m->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Input Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <!-- Input Konfirmasi Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script>
    document.getElementById('role').addEventListener('change', function () {
        var role = this.value;
        document.getElementById('emailField').style.display = role === 'admin' ? 'block' : 'none';
        document.getElementById('nipField').style.display = role === 'dosen' ? 'block' : 'none';
        document.getElementById('nimField').style.display = role === 'mahasiswa' ? 'block' : 'none';
    });
</script>
@endsection