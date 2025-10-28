<!DOCTYPE html>
<html lang="en">
<head>
    {{--CSS EKSTERNAL--}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Warga</title> {{-- GANTI --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- CSS INTERNAL --}}
    <style>
        
        /* Style untuk banner header */
        .hero-section {
        background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('.../gambar-banner.jpg');
        background-size: cover;
        background-position: center;
        color: #010000ff; /* Membuat semua teks di dalamnya putih */
        padding: 60px 20px; /* Menambah ruang di dalam banner */
        text-align: center;
}
        
        /* Style untuk kartu bencana (tetap pakai nama kelas yg sama, tidak masalah) */
        .bencana-card {
            border: 1px solid #edededff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.3s ease; /* Menambah animasi halus */
        }
        .bencana-card:hover {
            transform: translateY(-5px); /* Efek terangkat */
            box-shadow: 0 10px 20px rgba(0,0,0,0.15); /* Bayangan lebih jelas */
        }
        .bencana-card img {
            width: 100%;
            height: 200px; /* <--- ATUR TINGGI PASTI */
            object-fit: cover; /* <--- AJAIB! Mencegah gambar gepeng/penyok */
}
        
        .bencana-card-body {
            padding: 20px;
        }
        .bencana-card-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }
        .bencana-card-info {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 15px;
        }
        .bencana-card-info strong {
            color: #111;
        }
        .bencana-card-text {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            min-height: 60px; 
        }
        .bencana-card-actions .btn {
            margin-right: 5px;
            font-size: 0.85rem;
            padding: 5px 10px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #e7e7e7;
        }
    </style>
</head>
<body>
    {{--header--}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard-guest') }}">KEBENCANAAN DESA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard-guest') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kejadian-bencana.index') }}">Kejadian Bencana</a> 
                    </li>
                    {{-- TAMBAHKAN LINK WARGA & USER --}}
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('warga.index') }}">Warga</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">User</a> {{-- Nanti ganti ke route('users.index') --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{--APP--}}
    <div class="hero-section">
        <div class="text-center px-3">
            {{-- GANTI JUDUL --}}
            <h1 class="display-4 fw-bold">Manajemen Data Warga</h1>
            <p class="lead">Kelola data warga yang terdaftar di desa.</p>
            {{-- GANTI ROUTE & TEKS --}}
            <a href="{{ route('warga.create') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-plus-circle"></i> Tambah Data Warga
            </a>
        </div>
    </div>

    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            {{-- GANTI VARIABEL LOOP --}}
            @forelse ($wargas as $warga)
                <div class="col-md-6 col-lg-4">
                    <div class="bencana-card">
                        
                        {{-- GANTI GAMBAR (Warga mungkin tdk punya gambar, jadi pakai placeholder) --}}
                        <img src="https://via.placeholder.com/400x220.png?text=Foto+Warga" alt="Foto Warga">
                        
                        <div class="bencana-card-body">
                            {{-- GANTI FIELD --}}
                            <h5 class="bencana-card-title">{{ $warga->nama_lengkap }}</h5>
                            
                            {{-- GANTI INFO SESUAI DATA WARGA --}}
                            <div class="bencana-card-info">
                                <p class="mb-1"><strong><i class="fas fa-id-card"></i> NIK:</strong> {{ $warga->nik }}</p>
                                <p class="mb-1"><strong><i class="fas fa-phone-alt"></i> No. Telp:</strong> {{ $warga->no_telepon }}</p>
                                <p class="mb-0"><strong><i class="fas fa-home"></i> Alamat:</strong> {{ $warga->alamat }}</p>
                            </div>
                            
                            {{-- Hapus deskripsi, karena sudah diganti alamat di atas --}}
                            {{-- <p class="bencana-card-text">{{ $warga->deskripsi }}</p> --}}
                            
                            <div class="bencana-card-actions">
                                {{-- GANTI ROUTE & VARIABEL --}}
                                <a href="{{ route('warga.show', $warga->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center" role="alert">
                        {{-- GANTI TEKS --}}
                        <h4 class="alert-heading">Data Warga Kosong</h4>
                        <p>Belum ada data warga yang ditambahkan.</p>
                        <hr>
                        {{-- GANTI ROUTE & TEKS --}}
                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tambah Data Warga Pertama
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{-- GANTI VARIABEL PAGINASI --}}
            {{ $wargas->links() }}
        </div>
    </div>
        {{-- footer --}}
    <footer class="text-center text-muted">
        <div class="container">
            <p>&copy;Kepala Desa: <br>Eka Putra</br></p>
        </div>
    </footer>

    {{--JS--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>