@extends('layouts.app')

@section('title', 'Kelola Program Studi')

@section('content')
<div class="container">
    <h2>Data Program Studi</h2>
    <a href="{{ route('program_studi.create') }}" class="btn btn-primary">Tambah Program Studi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programStudi as $ps)
            <tr>
                <td>{{ $ps->kode }}</td>
                <td>{{ $ps->nama }}</td>
                <td>
                    <a href="{{ route('program_studi.edit', $ps->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('program_studi.destroy', $ps->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection