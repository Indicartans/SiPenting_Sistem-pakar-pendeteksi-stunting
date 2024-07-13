@extends('landing_main')
@section('title', 'SiPenting')
@section('external_assets')
    <style>
        .reviews-section {
            background-color: rgb(214, 214, 214);
            color: black
        }

        .head-section {
            color: rgb(52, 51, 51)
        }

        .reviews-block {
            background-color: black
        }
    </style>
@endsection

@section('content')
    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-12 mx-auto">
                    <em class="small-text">Selamat datang di</em>

                    <h1>SiPenting</h1>

                    <p class="text-white mb-4 pb-lg-2">
                        Sistem Pendeteksi Stunting
                    </p>

                    <a class="btn custom-btn smoothscroll me-2 mb-2" href="#section_3"><strong>Diagnosa
                            Sekarang!</strong></a>
                </div>

            </div>
        </div>

        <div class="hero-slides"></div>
    </section>

    <section class="about-section section-padding" id="section_2">
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-12">
                    <div class="ratio ratio-1x1">
                        {{-- <video autoplay="" loop="" muted="" class="custom-video" poster="">
                <source src="videos/pexels-mike-jones-9046237.mp4" type="video/mp4">

                Your browser does not support the video tag.
            </video> --}}
                        <img src="images/stunting.jpg" alt="" class="ratio ratio-1x1">

                        <div class="about-video-info d-flex flex-column">
                            <h4 class="mt-auto">SiPenting</h4>

                            <h4>Sistem Pendeteksi Stunting</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12 mt-4 mt-lg-0 mx-auto">

                    <h2 class="text-white mb-3">Apa itu SiPenting?</h2>

                    <p class="text-white">SiPenting adalah aplikasi yang dirancang untuk membantu orang
                        tua dalam mendeteksi potensi stunting pada anak dengan menyediakan sebuah sistem
                        pakar yang memungkinkan pengguna untuk mengukur risiko stunting. Kami percaya
                        bahwa mendeteksi dini potensi stunting adalah langkah penting dalam mencegah
                        dampak jangka panjangnya pada pertumbuhan dan perkembangan anak. Selain itu,
                        kami juga menyediakan informasi dan sumber daya yang berguna untuk membantu
                        orang tua dalam mengelola serta mengatasi risiko stunting pada anak.</p>
                </div>

            </div>
        </div>
    </section>



    <section class="reviews-section section-padding section-bg" id="section_4">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                    <h2 class="head-section">Informasi Mengenai SiPenting</h2>
                    <hr>
                </div>

                <div class="timeline">
                    <div class="timeline-container timeline-container-left">
                        <div class="timeline-content">
                            <div class="reviews-block" style="background-color: black">
                                <div class="reviews-block-image-wrap d-flex align-items-center">
                                    <div class="">
                                        <h6 class="text-white mb-0">Apakah hasil dari SiPenting dapat diandalkan?
                                        </h6>
                                    </div>
                                </div>

                                <div class="reviews-block-info">
                                    <p>Hasil dari SiPenting adalah sebuah estimasi dari tingkat terjadinya stunting
                                        pada anak,
                                        dan tidak bisa dianggap sebagai diagnosis yang pasti. Kami sangat
                                        menyarankan agar tetap
                                        meminta
                                        bantuan kepada seorang yang profesional seperti ahli gizi atau dokter anak.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-container timeline-container-right">
                        <div class="timeline-content">
                            <div class="reviews-block">
                                <div class="reviews-block-image-wrap d-flex align-items-center">
                                    <div class="">
                                        <h6 class="text-white mb-0">Bagaimana cara mengakses solusi dari SiPenting?
                                        </h6>
                                    </div>
                                </div>

                                <div class="reviews-block-info">
                                    <p>Setelah mengisi formulir, Pengguna akan menerima rekomendasi solusi sesuai
                                        dengan
                                        penyakit yang terdeteksi. Kami juga menyediakan tautan ke sumber informasi
                                        dan yang dapat membantu orangtua mengatasi penyakit yang terjadi pada anak.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-container timeline-container-left">
                        <div class="timeline-content">
                            <div class="reviews-block">
                                <div class="reviews-block-image-wrap d-flex align-items-center">
                                    <div class="">
                                        <h6 class="text-white mb-0">Apakah SiPenting dapat digunakan untuk anak di
                                            semua usia?</h6>
                                    </div>
                                </div>

                                <div class="reviews-block-info">
                                    <p>SiPenting dirancang untuk membantu mengidentifikasi risiko stunting pada
                                        anak-anak dari usia 0 hingga 5 tahun. Untuk anak di luar rentang usia ini,
                                        kami sarankan untuk berkonsultasi langsung dengan dokter anak atau ahli
                                        gizi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
