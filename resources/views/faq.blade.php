@extends('landing_main')
@section('title', 'Diagnosa Stunting')
@section('external_assets')
    <style>
        .barista-section {
            background-color: rgb(237, 237, 237)
        }

        .card {
            border: none;
            box-shadow: 0 0 20px #e1e1e1;

        }
    </style>

@endsection
@section('content')
    <section class="barista-section section-padding section-bg m-0" id="barista-team">
        <div class="container mt-5">
            <form method='post' enctype='multipart/form-data' id='gform_1' action="/form" novalidate>
                @csrf
                <section id="faq" class="bg-light py-5 rounded">
                    <div class="container">
                        <h2 class="text-center mb-5 entry-title" style="color: #055596">Data Diri Anak</h2>
                        {{-- <div class="accordion" id="faqAccordion">
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
                        </div> --}}
                        <div class="row mb-3">
                            <p class="fw-norma text-center" style="color: black">Silahkan isi data diri anak anda
                            </p>
                            {{-- @if (session()->has('pesan'))
                                {!! session('pesan') !!}
                            @endif --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3 p-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama Orangtua') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="nama_orangtua"
                                        required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama Anak') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="nama_anak" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="usia"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Usia') }}</label>
                                <div class="col-md-6">

                                    <select name="usia" id="usia" class="form-control">
                                        <option value="1">Kurang dari 1 Tahun</option>
                                        <option value="1">1 Tahun</option>
                                        <option value="2">2 Tahun</option>
                                        <option value="3">3 Tahun</option>
                                        <option value="4">4 Tahun</option>
                                        <option value="5">5 Tahun</option>
                                        {{-- <option value="2">1-5 tahun</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kontak"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Kontak') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="kontak" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="alamat" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class='gform_page_footer top_label d-flex justify-content-end'>
                            {{-- <a href="/form" id="nextbtn" class='btn btn-primary'>Next</a> --}}
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </section>
@endsection

@section('external_js')
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usiaSelected = getElementById('usia');
            const button = getElementById('nextbtn');

            usiaSelected.addEventListener('change', function() {
                const selectedValue = usiaSelected.value;
                button.href = `form?usia=${selectedValue}`
            })
        })
    </script> --}}
@endsection
