<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kejadian Bencana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .detail-img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 24px;
        }
        .detail-title {
            font-weight: 700;
            color: #2c3e50;
        }
        .info-list {
            list-style: none;
            padding-left: 0;
        }
        .info-list li {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: #34495e;
        }
        .info-list li i {
            width: 30px;
            color: #0d6efd;
            text-align: center;
        }
        .deskripsi-title {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 5px;
            display: inline-block;
            margin-top: 20px;
        }
        .deskripsi-text {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #6b6b6bff;
            text-align: justify;
        }
        .action-buttons .btn, .action-buttons .d-inline {
            margin-top: 10px;
            margin-right: 10px;
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
    <div class="container my-5">
        <div class="card shadow-sm border-0 p-4 p-md-5">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="detail-title mb-4 text-center">{{ $kejadianBencana->nama_bencana }}</h1>
                </div>
                
                <div class="col-lg-7">
                    @if ($kejadianBencana->gambar)
                        <img src="{{ Storage::url($kejadianBencana->gambar) }}" class="detail-img" alt="{{ $kejadianBencana->nama_bencana }}">
                    @else
                        <img src="https://via.placeholder.com/800x500.png?text=Tidak+Ada+Gambar" class="detail-img" alt="Tidak Ada Gambar">
                    @endif
                </div>

                <div class="col-lg-5">
                    <h4 class="deskripsi-title mb-3">Detail Informasi</h4>
                    <ul class="info-list mt-4">
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 
                            <strong>Lokasi:</strong> {{ $kejadianBencana->lokasi }}
                        </li>
                        <li>
                            <i class="fas fa-calendar-alt"></i> 
                            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kejadianBencana->tanggal_kejadian)->format('l, d F Y') }}
                        </li>
                        <li>
                            <i class="fas fa-clock"></i> 
                            <strong>Dilaporkan:</strong> {{ $kejadianBencana->created_at->diffForHumans() }}
                        </li>
                    </ul>

                    <div class="action-buttons mt-4 pt-4 border-top">
                        <a href="{{ route('kejadian-bencana.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                        </a>
                        <a href="{{ route('kejadian-bencana.edit', $kejadianBencana->id) }}" class="btn btn-warning text-dark">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('kejadian-bencana.destroy', $kejadianBencana->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12 mt-4">
                    <h4 class="deskripsi-title mb-3">Deskripsi Kejadian</h4>
                    <p class="deskripsi-text mt-3">
                        {!! nl2br(e($kejadianBencana->deskripsi)) !!} </p>
                </div>
            </div>
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