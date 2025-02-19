@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Tahun Akademik</h3>
    <form action="{{ route('tahun_akademik.update', $tahunAkademik->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ $tahunAkademik->tahun_akademik }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Semester</label>
            <select name="semester" class="form-select">
                <option value="Ganjil" {{ $tahunAkademik->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                <option value="Genap" {{ $tahunAkademik->semester == 'Genap' ? 'selected' : '' }}>Genap</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tahun_akademik.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection