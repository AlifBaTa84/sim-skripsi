@extends('layouts.app')

@section('title', 'Edit Program Studi')

@section('content')
<div class="container">
    <h2>Edit Program Studi</h2>

    <form action="{{ route('program_studi.update', $programStudi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Program Studi</label>
            <input type="text" name="kode_prodi" class="form-control" value="{{ $programStudi->kode }}" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $programStudi->nama }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('program_studi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection