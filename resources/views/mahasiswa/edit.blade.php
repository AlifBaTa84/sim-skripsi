@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Mahasiswa</h2>
        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" value="{{ $mahasiswa->nim }}" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $mahasiswa->email }}" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <select name="program_studi_id" class="form-control">
                    @foreach ($programStudis as $ps)
                        <option value="{{ $ps->id }}" {{ $mahasiswa->program_studi_id == $ps->id ? 'selected' : '' }}>
                            {{ $ps->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update</button>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
@endsection