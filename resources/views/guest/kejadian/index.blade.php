<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kejadian Bencana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Style untuk banner header */
        .hero-section {
            background: url('{{ asset('assets-guest/images/bencana-banner.jpg') }}') no-repeat center center/cover; /* Ganti dengan path gambar banner Anda */
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
            margin-bottom: 30px;
        }
        
        /* Style untuk kartu bencana */
        .bencana-card {
            border: 1px solid #edededff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .bencana-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.12);
        }
        .bencana-card img {
            width: 100%;
            height: 220px;
            object-fit: cover; 
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
                        <a class="nav-link active" aria-current="page" href="{{ route('kejadian-bencana.index') }}">Kejadian Bencana</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Posko Bencana</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Donasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Distribusi Logistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="hero-section">
        <div class="text-center px-3">
            <h1 class="display-4 fw-bold">Informasi Kejadian Bencana</h1>
            <p class="lead">Pantau dan laporkan kejadian bencana di sekitar Anda.</p>
            <a href="{{ route('kejadian-bencana.create') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-plus-circle"></i> Tambah Laporan Baru
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
            @forelse ($kejadianBencanas as $bencana)
                <div class="col-md-6 col-lg-4">
                    <div class="bencana-card">
                        @if ($bencana->gambar)
                            <img src="{{ Storage::url($bencana->gambar) }}" alt="{{ $bencana->nama_bencana }}">
                        @else
                            <img src="https://via.placeholder.com/400x220.png?text=Tidak+Ada+Gambar" alt="Tidak Ada Gambar">
                        @endif
                        
                        <div class="bencana-card-body">
                            <h5 class="bencana-card-title">{{ $bencana->nama_bencana }}</h5>
                            <div class="bencana-card-info">
                                <p class="mb-1"><strong><i class="fas fa-map-marker-alt"></i> Lokasi:</strong> {{ $bencana->lokasi }}</p>
                                <p class="mb-0"><strong><i class="fas fa-calendar-alt"></i> Tanggal:</strong> {{ \Carbon\Carbon::parse($bencana->tanggal_kejadian)->format('d F Y') }}</p>
                            </div>
                            <p class="bencana-card-text">{{ $bencana->deskripsi }}</p>
                            
                            <div class="bencana-card-actions">
                                <a href="{{ route('kejadian-bencana.show', $bencana->id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                                <a href="{{ route('kejadian-bencana.edit', $bencana->id) }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('kejadian-bencana.destroy', $bencana->id) }}" method="POST" class="d-inline">
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
                        <h4 class="alert-heading">Data Kosong</h4>
                        <p>Belum ada data kejadian bencana yang dilaporkan.</p>
                        <hr>
                        <a href="{{ route('kejadian-bencana.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Jadi yang pertama melaporkan
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $kejadianBencanas->links() }}
        </div>
    </div>

    <footer class="text-center text-muted">
        <div class="container">
            <p>&copy; {{ date('Y') }} Sistem Informasi Kebencanaan Desa. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>