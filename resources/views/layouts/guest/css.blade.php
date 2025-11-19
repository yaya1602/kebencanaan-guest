<!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('guest/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('guest/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('guest/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('guest/css/style.css')}}" rel="stylesheet">

    <style>
/* Efek getar halus untuk card kejadian bencana */
.kejadian-card {
    transition: all 0.3s ease;
    border-radius: 10px;
    overflow: hidden;
    position: relative;
    cursor: pointer;
}

.kejadian-card:hover {
    transform: scale(1.02);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    animation: smoothShake 0.45s ease-in-out;
}

/* Animasi getar halus */
@keyframes smoothShake {
    0%, 100% { transform: translateX(0) scale(1.02); }
    25% { transform: translateX(-2px) scale(1.02); }
    50% { transform: translateX(2px) scale(1.02); }
    75% { transform: translateX(-1px) scale(1.02); }
}

/* Efek cahaya saat hover */
.kejadian-card::after {
    content: "";
    position: absolute;
    top: -60%;
    left: -70%;
    width: 50%;
    height: 220%;
    background: rgba(255, 255, 255, 0.08);
    transform: rotate(25deg);
    transition: all 0.7s ease;
    pointer-events: none;
}

.kejadian-card:hover::after {
    left: 120%;
    background: rgba(255, 255, 255, 0.15);
}
</style>

<style>
/* Card warga */
.warga-card {
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: pointer;
    background: #f8f9fa; /* abu muda, tidak putih murni */
    border: 1px solid #e0e0e0;
}

/* Efek hover */
.warga-card:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    animation: smoothShake 0.4s ease-in-out;
}

/* Getar halus */
@keyframes smoothShake {
    0%, 100% { transform: translate(0, 0) scale(1.02); }
    25% { transform: translate(-1.5px, 0) scale(1.02); }
    50% { transform: translate(1.5px, 0) scale(1.02); }
    75% { transform: translate(-1px, 0) scale(1.02); }
}

/* Efek cahaya lembut di hover */
.warga-card::after {
    content: "";
    position: absolute;
    top: -60%;
    left: -70%;
    width: 50%;
    height: 220%;
    background: rgba(255, 255, 255, 0.05);
    transform: rotate(25deg);
    transition: all 0.7s ease;
    pointer-events: none;
}

.warga-card:hover::after {
    left: 120%;
    background: rgba(255, 255, 255, 0.1);
}

/* Sedikit bayangan di awal */
.warga-card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
}
</style>

