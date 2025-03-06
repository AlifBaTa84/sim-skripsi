@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Spesialisasi Dosen</h2>
    <a href="{{ route('spesialisasi_dosen.create') }}" class="btn btn-primary">Tambah Spesialisasi</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($spesialisasi as $item)
            <tr>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a href="{{ route('spesialisasi_dosen.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('spesialisasi_dosen.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $spesialisasi->links() }}
</div>
@endsection