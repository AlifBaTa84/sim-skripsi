@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Tahun Akademik</h3>
    <form action="{{ route('tahun_akademik.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" placeholder="2023/2024" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select">
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tahun_akademik.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection