{{-- META TAG UMUM --}}
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- CSS DINAMIS BERDASARKAN HALAMAN --}}
@if (Request::is('dashboard-guest'))
    <title>Dashboard Guest - Kebencanaan Desa</title>
    <link rel="stylesheet" href="{{ asset('assets-guest/css/dashboard-guest.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

@elseif (Request::is('kejadian-bencana*'))
    <title>Daftar Kejadian Bencana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- CSS INTERNAL KHUSUS HALAMAN KEJADIAN BENCANA --}}
    <style>
        /* Banner */
        .hero-section {
            background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('.../gambar-banner.jpg');
            background-size: cover;
            background-position: center;
            color: #010000ff;
            padding: 60px 20px;
            text-align: center;
        }

        /* Kartu Bencana */
        .bencana-card {
            border: 1px solid #edededff;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .bencana-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .bencana-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            margin-top: 40px;
            border-top: 1px solid #e7e7e7;
        }

        .nav-link.active {
            color: #fff !important;
            background-color: #0d6efd;
            border-radius: 5px;
        }


    </style>
@endif
