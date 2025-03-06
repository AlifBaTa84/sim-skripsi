<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Manajemen Skripsi</h4>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('tahun_akademik.index')}}">Data Tahun Akademik</a> 
        <a href="{{ route('program_studi.index') }}">Data Program Studi</a> 
        <a href="{{ route('spesialisasi_dosen.index')}}">Data Spesialisasi Dosen</a>
        <a href="{{ route('dosen.index')}}">Data Dosen</a>
        <a href="{{ route('mahasiswa.index')}}">Data Mahasiswa</a>
        <a href="{{ route('user.index')}}">Data User</a>
        <hr>
        <form method="POST" action="#">
            @csrf
            <button type="submit" class="btn btn-danger w-100">Logout</button>
        </form>
    </div>

    <!-- Konten -->
    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>