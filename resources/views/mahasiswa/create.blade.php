@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <select name="program_studi_id" class="form-control">
                    @foreach ($programStudis as $ps)
                        <option value="{{ $ps->id }}">{{ $ps->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
@endsection