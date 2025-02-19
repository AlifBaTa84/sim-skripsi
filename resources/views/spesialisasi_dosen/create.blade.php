@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Spesialisasi Dosen</h2>
    <form action="{{ route('spesialisasi_dosen.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('spesialisasi_dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection