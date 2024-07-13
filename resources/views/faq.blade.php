@extends('landing_main')
@section('title', 'Diagnosa Stunting')
@section('external_assets')
    <style>

    </style>

@endsection
@section('content')
    <section class="barista-section section-padding section-bg m-0" id="barista-team">
        <div class="container">
            <form method='post' enctype='multipart/form-data' id='gform_1' action="{{ route('spk.store') }}" novalidate>
                @csrf
                <section id="faq" class="bg-light py-5 rounded">
                    <div class="container">
                        <h2 class="text-center mb-5">Informasi Umum Mengenai SiPenting</h2>
                        <div class="accordion" id="faqAccordion">
                            <div class="card mb-3">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link text-decoration-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Apa itu Sipenting?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        SiPenting adalah aplikasi yang dirancang untuk membantu orang tua dalam
                                        mendeteksi potensi stunting pada anak dengan menyediakan sebuah sistem
                                        pakar yang memungkinkan pengguna untuk mengukur risiko stunting. Kami
                                        percaya bahwa mendeteksi dini potensi stunting adalah langkah penting
                                        dalam mencegah dampak jangka panjangnya pada pertumbuhan dan
                                        perkembangan anak. Selain itu, kami juga menyediakan informasi dan
                                        sumber daya yang berguna untuk membantu orang tua dalam mengelola serta
                                        mengatasi risiko stunting pada anak.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link text-decoration-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree">
                                            Apakah hasil dari SiPenting dapat diandalkan?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Hasil dari SiPenting adalah sebuah estimasi dari tingkat terjadinya
                                        stunting pada anak, dan tidak bisa dianggap sebagai diagnosis yang
                                        pasti. Kami sangat menyarankan agar tetap konsultasi dokter profesional.
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link text-decoration-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                            aria-controls="collapseFour">
                                            Bagaimana cara mengakses solusi yang ditawarkan SiPenting?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                    data-parent="#faqAccordion">
                                    <div class="card-body">
                                        Setelah mengisi formulir, pengguna akan menerima rekomendasi solusi
                                        sesuai dengan penyakit yang terdeteksi. Kami juga menyediakan tautan ke
                                        sumber informasi dan bantuan profesional yang dapat membantu pengguna.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='gform_page_footer top_label d-flex justify-content-end'>
                            <a href="/form" class='btn btn-primary'>Next</a>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </section>
@endsection
