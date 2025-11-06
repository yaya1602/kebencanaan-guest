@extends('layouts.guest.app')
@section('content')
<!-- main content -->
        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Kebencanaan dan Tanggap Darurat</h1>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="{{ asset('assets-guest/img/Gunung2.jpg') }}" alt="Pegunungan">


                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">

            </div>
        </div>
        <!-- Search End -->


        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ asset('assets-guest/img/pegunungan.jpeg') }}" alt="Pegunungan">


                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">Ayo Cari tahu!!</h1>
                        <p class="mb-4">Website Kebencanaan ini hadir untuk membantu masyarakat desa dalam memperoleh informasi cepat, tepat, dan akurat mengenai bencana alam yang terjadi di sekitar mereka.
                                Selain itu, website ini juga menjadi media koordinasi antara pemerintah desa, relawan, dan masyarakat dalam penanganan bencana.</p>
                        <p><i class="fa fa-check text-primary me-3"></i> Memudahkan pelaporan dan pendataan bencana.</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Meningkatkan transparansi dalam penyaluran bantuan</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Membangun kesadaran dan kesiapsiagaan masyarakat terhadap risiko bencana.</p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Call to Action Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded p-3">
                    <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                        <div class="row g-5 align-items-center">
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid rounded w-100" src="{{ asset('assets-guest/img/logistik.jpeg') }}" alt="logistik">
                            </div>
                            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                                <div class="mb-4">
                                    <h1 class="mb-3">Relawan Tanggap Bencana</h1>
                                    <p>Bersama masyarakat dan pemerintah desa, relawan berperan penting dalam penanganan darurat, distribusi bantuan, dan pemulihan pasca bencana.</p>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->


        <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">fill off website</h1>
                    <p>Ini adalah beberapa isi dari website kebencanaan</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('assets-guest/img/donasi.jpg') }}" alt="donasi">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">

                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Donasi</h5>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('assets-guest/img/kejadian_bencana.jpeg') }}" alt="kejadian_bencana">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">

                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Kejadian Bencana</h5>

                            </div>
                        </div>
                    </div>
                   <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                    <img class="img-fluid" src="{{ asset('assets-guest/img/posko.jpeg') }}" alt="posko">
                    <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                    </div>
        </div> <!-- ✅ tambahan penutup di sini -->
        <div class="text-center p-4 mt-3">
            <h5 class="fw-bold mb-0">Posko</h5>
        </div>
    </div>
</div>

                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="team-item rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="{{ asset('assets-guest/img/logistik.jpeg') }}" alt="logistik">
                                <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">

                                </div>
                            </div>
                            <div class="text-center p-4 mt-3">
                                <h5 class="fw-bold mb-0">Logistik</h5>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->
<!-- main content -->
@endsection
