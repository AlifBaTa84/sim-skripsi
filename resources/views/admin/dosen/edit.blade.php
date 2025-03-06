@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Dosen</h2>
        <form action="{{ route('dosen.update', $dosen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $dosen->nama }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $dosen->email }}" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <select name="program_studi_id" class="form-control">
                    @foreach ($programStudis as $ps)
                        <option value="{{ $ps->id }}" {{ $dosen->program_studi_id == $ps->id ? 'selected' : '' }}>
                            {{ $ps->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Spesialisasi</label>
                <select name="spesialisasi_id" class="form-control">
                    @foreach ($spesialisasis as $sp)
                        <option value="{{ $sp->id }}" {{ $dosen->spesialisasi_id == $sp->id ? 'selected' : '' }}>
                            {{ $sp->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary mt-2">Batal</a>
        </form>
    </div>
@endsection