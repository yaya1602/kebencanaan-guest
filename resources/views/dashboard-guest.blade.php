<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guest - Kebencanaan Desa</title>
    <link rel="stylesheet" href="{{ asset('assets-guest/css/dashboard-guest.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="navbar">
        <div class="logo"> <img src="{{ asset('assets-guest/assets/img/DESA-icon.jpeg') }}" alt=""></div>
        <nav class="menu">
            <a href="{{ route('dashboard-guest') }}" class="active">Beranda</a>
            <a href="{{ route('kejadian-bencana.index') }}">Kejadian Bencana</a>
            <a href="#">Posko Bencana</a>
            <a href="#">Donasi</a>
            <a href="#">Logistik</a>
            <a href="#">Distribusi Logistik</a>
        </nav>
        <div class="login">
            <a href="{{ url('/auth') }}">Masuk</a>
        </div>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>KEBENCANAAN<br>DESA</h1>
            <p>
                Pantau dan dapatkan informasi kebencanaan desa secara cepat dan terintegrasi.
                Dapatkan data kejadian, posko, donasi, serta logistik dengan mudah dan akurat.
            </p>
            <a href="{{ route('kejadian-bencana.index') }}" class="btn-primary">Ayo Lihat!!</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('assets-guest/assets/img/Pedesaan.jpg') }}" alt="Balai Desa">
        </div>
    </section>

    <section class="categories">

        <a href="{{ route('kejadian-bencana.index') }}" style="text-decoration: none; color: inherit;">
            <div class="category"> 
                <img src="{{ asset('assets-guest/assets/img/kejadian bencana.jpeg') }}" alt="Kejadian Bencana">
                <p>Kejadian Bencana</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none; color: inherit;">
            <div class="category">
                <img src="{{ asset('assets-guest/assets/img/posko.jpeg') }}" alt="Posko Bencana">
                <p>Posko Bencana</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none; color: inherit;">
            <div class="category">
                <img src="{{ asset('assets-guest/assets/img/donasi.jpg') }}" alt="Donasi">
                <p>Donasi</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none; color: inherit;">
            <div class="category">
                <img src="{{ asset('assets-guest/assets/img/logistik.jpeg') }}" alt="Logistik">
                <p>Logistik</p>
            </div>
        </a>

        <a href="#" style="text-decoration: none; color: inherit;">
            <div class="category">
                <img src="{{ asset('assets-guest/assets/img/distribusi.jpg') }}" alt="Distribusi Logistik">
                <p>Distribusi Logistik</p>
            </div>
        </a>

    </section>

</body>
</html>