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
                        <div class="row mb-3">
                            <p class="fw-norma text-center" style="color: black">Silahkan isi data anak
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
                                <label for="berat_badan"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Berat Badan') }}</label>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="berat_badan" type="text"
                                            class="form-control @error('berat_badan') is-invalid @enderror"
                                            name="berat_badan" required autocomplete="name" autofocus>
                                        <p class="fw-bold mb-0 ms-2" style="color: black">kg</p>
                                    </div>
                                    @error('berat_badan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tinggi_badan"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Tinggi Badan') }}</label>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="tinggi_badan" type="text"
                                            class="form-control @error('tinggi_badan') is-invalid @enderror"
                                            name="tinggi_badan" required autocomplete="name" autofocus>
                                        <p class="fw-bold mb-0 ms-2" style="color: black">cm</p>
                                    </div>

                                    @error('tinggi_badan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lingkar_lengan"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Lingkar Lengan') }}</label>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="lingkar_lengan" type="text"
                                            class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                            name="lingkar_lengan" required autocomplete="name" autofocus>
                                        <p class="fw-bold mb-0 ms-2" style="color: black">cm</p>
                                    </div>
                                    @error('lingkar_lengan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lingkar_kepala"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Lingkar Kepala') }}</label>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <input id="lingkar_kepala" type="text"
                                            class="form-control @error('lingkar_kepala') is-invalid @enderror"
                                            name="lingkar_kepala" required autocomplete="name" autofocus>
                                        <p class="fw-bold mb-0 ms-2" style="color: black">cm</p>
                                    </div>

                                    @error('lingkar_kepala')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </section>
@endsection
