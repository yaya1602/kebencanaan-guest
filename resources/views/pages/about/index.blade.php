@extends('layouts.guest.app')

@section('title', 'Tentang Kami')

@section('content')

<div class="container py-5">
    <div class="bg-white shadow-md rounded-4 p-4 p-md-5">
        <h1 class="text-center mb-4 fw-bold">Tentang Kami</h1>
        <p class="text-muted text-justify mb-3">
            Aplikasi <strong>Kebencanaan Guest</strong> ini dibuat untuk membantu masyarakat dalam melaporkan, 
            memantau, dan mengelola informasi seputar kejadian bencana di wilayah sekitar. 
            Melalui aplikasi ini, kami berharap dapat meningkatkan kesadaran masyarakat terhadap mitigasi bencana 
            dan mempercepat respon terhadap kejadian darurat.
        </p>

        <p class="text-muted text-justify mb-5">
            Kami berkomitmen untuk menyediakan informasi yang akurat dan mudah diakses, 
            dengan dukungan dari berbagai pihak seperti sekolah, warga, dan instansi terkait.
        </p>

        <!-- Card bergambar -->
        <div class="row g-4 text-center">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('assets-guest/img/logistik.jpeg') }}" 
                        
                             class="card-img-top object-fit-cover" 
                             alt="Tim Kebencanaan">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Tim Kebencanaan</h5>
                        <p class="card-text text-muted small text-justify">
                            Kami terdiri dari tim relawan dan pengembang yang berdedikasi untuk memberikan solusi tanggap darurat berbasis digital.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('assets-guest/img/donasi.jpg') }}"

                             class="card-img-top object-fit-cover" 
                             alt="Kolaborasi Masyarakat">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Kolaborasi Masyarakat</h5>
                        <p class="card-text text-muted small text-justify">
                            Kami percaya bahwa kesadaran dan kerja sama masyarakat sangat penting dalam menghadapi situasi bencana.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="ratio ratio-16x9">
                        <img src="{{ asset('assets-guest/img/posko.jpeg') }}" 

                             class="card-img-top object-fit-cover" 
                             alt="Tanggap Darurat Cepat">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Tanggap Darurat Cepat</h5>
                        <p class="card-text text-muted small text-justify">
                            Kami berupaya menyediakan sistem yang mempercepat proses pelaporan dan penanganan kejadian bencana di lapangan.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kontak -->
        <div class="mt-5 text-center">
            <h2 class="h5 fw-semibold mb-3 text-secondary">Kontak Kami</h2>
            <p class="text-muted mb-1">
                Email: 
                <a href="mailto:info@kebencanaan.com" class="text-primary text-decoration-none">
                    info@kebencanaan.com
                </a>
            </p>
            <p class="text-muted mb-0">Telepon: +62 812 3456 7890</p>
        </div>
    </div>
</div>
@endsection
