@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Dosen</h2>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Program Studi</th>
                    <th>Spesialisasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->programStudi->nama }}</td>
                        <td>{{ $dosen->spesialisasi->nama }}</td>
                        <td>
                            <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $dosens->links() }}
    </div>
@endsection