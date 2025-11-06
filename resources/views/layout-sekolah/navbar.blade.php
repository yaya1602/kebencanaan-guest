<div class="container-fluid nav-bar bg-transparent">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
        <a href="{{ route('dashboard-guest') }}" class="navbar-brand d-flex align-items-center text-center">
            <div class="icon p-2 me-2">
                <img class="img-fluid" src="{{ asset('guest/img/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
            </div>
            <h1 class="m-0 text-primary">Kebencanaan</h1>
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
                <a href="{{ route('dashboard-guest') }}" class="nav-item nav-link">Home</a>
                <a href="#" class="nav-item nav-link">About</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Daftar Bencana</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('kejadian_bencana.index') }}" class="dropdown-item">Kejadian Bencana</a>
                        <a href="#" class="dropdown-item">Posko Bencana</a>
                        <a href="#" class="dropdown-item">Donasi Bencana</a>
                        <a href="#" class="dropdown-item">Logistik</a>
                        <a href="#" class="dropdown-item">Distribusi</a>
                    </div>
                    
                </div>
                <a href="{{ route('warga.index') }}" class="nav-item nav-link">Warga</a>

                <a href="{{ route('user.index') }}" class="nav-item nav-link">User</a>
            </div>
        </div>
    </nav>
</div>
