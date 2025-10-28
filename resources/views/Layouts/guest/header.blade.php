<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard-guest') }}">KEBENCANAAN DESA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard-guest') ? 'active' : '' }}" href="{{ route('dashboard-guest') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('kejadian-bencana.*') ? 'active' : '' }}" href="{{ route('kejadian-bencana.index') }}">Kejadian Bencana</a> 
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('guest/posko*') ? 'active' : '' }}" href="#">Posko Bencana</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('guest/donasi*') ? 'active' : '' }}" href="#">Donasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('guest/logistik*') ? 'active' : '' }}" href="#">Logistik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('guest/distribusi*') ? 'active' : '' }}" href="#">Distribusi Logistik</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="#">Masuk</a>
    </li>
</ul>

            </div>
        </div>
    </nav>