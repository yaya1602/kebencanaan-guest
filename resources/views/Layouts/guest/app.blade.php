<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.guest.css')
</head>
<body>
    {{-- header --}}
    @include('layouts.guest.header')

    {{-- APP --}}
    @yield('content')

    {{-- footer --}}
    @include('layouts.guest.footer')

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/628956742837?text=Halo%20saya%20ingin%20bertanya%20tentang%20laporan%20bencana"
       class="float-wa" target="_blank" title="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    {{-- CSS Floating Button --}}
    <style>
    .float-wa {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 25px;
        right: 25px;
        background-color: #25D366;
        color: #fff;
        border-radius: 50%;
        text-align: center;
        font-size: 28px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        z-index: 9999;
        transition: all 0.3s ease;
    }
    .float-wa:hover {
        background-color: #1ebe57;
        transform: scale(1.05);
    }
    .float-wa i {
        margin-top: 16px;
    }
    </style>
</body>
</html>
