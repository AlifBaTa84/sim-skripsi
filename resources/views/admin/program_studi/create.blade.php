@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Program Studi</h2>
    <form action="{{ route('program_studi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Program Studi</label>
            <input type="text" class="form-control" name="kode" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Program Studi</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection