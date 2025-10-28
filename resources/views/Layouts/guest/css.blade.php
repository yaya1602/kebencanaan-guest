{{--CSS EKSTERNAL--}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kejadian Bencana</title>
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
        
        /* Style untuk kartu bencana */
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
        .nav-link.active {
           color: #fff !important;
           background-color: #0d6efd;
           border-radius: 5px;
}
