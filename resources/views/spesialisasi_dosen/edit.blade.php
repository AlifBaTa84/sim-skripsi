@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Spesialisasi Dosen</h2>
    <form action="{{ route('spesialisasi_dosen.update', $spesialisasiDosen->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $spesialisasiDosen->kode }}">
        </div>
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $spesialisasiDosen->nama }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('spesialisasi_dosen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection