@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Dosen</h2>
        <form action="{{ route('dosen.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
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
            <div class="form-group">
                <label>Spesialisasi</label>
                <select name="spesialisasi_id" class="form-control">
                    @foreach ($spesialisasis as $sp)
                        <option value="{{ $sp->id }}">{{ $sp->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
@endsection