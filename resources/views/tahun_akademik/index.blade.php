@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Tahun Akademik</h3>
    <a href="{{ route('tahun_akademik.create') }}" class="btn btn-primary mb-3">Tambah Tahun Akademik</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->tahun_akademik }}</td>
                    <td>{{ $item->semester }}</td>
                    <td>
                        <a href="{{ route('tahun_akademik.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tahun_akademik.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
</div>
@endsection