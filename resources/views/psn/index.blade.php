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
            <form method='POST' action="{{ route('psn.store') }}">
                @csrf
                <section id="faq" class="bg-light py-5 rounded">
                    <div class="container">
                        <h2 class="text-center mb-3 entry-title" style="color: #055596">Lapor PSN</h2>
                        <div class="row mb-3">
                            <p class="fw-normaL text-center" style="color: black">Silahkan isi data Lapor PSN
                            </p>
                            @if (session()->has('pesan'))
                                {!! session('pesan') !!}
                            @endif
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
                                <label for="pelapor"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama Pelapor') }}</label>
                                <div class="col-md-6">
                                    <input id="pelapor" type="text"
                                        class="form-control @error('pelapor') is-invalid @enderror" name="pelapor" required
                                        autocomplete="pelapor" autofocus>
                                    @error('pelapor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nama Kepala Rumah Tangga') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="nama" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rt"
                                    class="col-md-4 col-form-label text-md-end">{{ __('RT') }}</label>
                                <div class="col-md-6">
                                    <select name="rt" id="rt" class="form-control">
                                        <option value="" selected disabled>Pilih RT</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                    </select>
                                    @error('rt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rw"
                                    class="col-md-4 col-form-label text-md-end">{{ __('RW') }}</label>
                                <div class="col-md-6">
                                    <select name="rw" id="rw" class="form-control">
                                        <option value="" selected disabled>Pilih RT</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                    </select>
                                    @error('rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jentik_nyamuk"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Jentik Nyamuk') }}</label>
                                <div class="col-md-6">
                                    <select name="jentik_nyamuk" id="jentik_nyamuk" class="form-control">
                                        <option value="" selected disabled>Apakah ada jentik nyamuk?</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak ada</option>
                                    </select>
                                    @error('rw')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jentik_nyamuk"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Indikasi Penyakit') }}</label>
                                <div class="col-md-2">
                                    <input type="radio" class="form-check-input" id="db" name="penyakit"
                                        value="Demam Berdarah">
                                    <label for="db" class="form-check-label">Demam Berdarah</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" class="form-check-input" id="malaria" name="penyakit"
                                        value="Malaria">
                                    <label for="malaria" class="form-check-label">Malaria</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" class="form-check-input" id="none" name="penyakit"
                                        value="">
                                    <label for="none" class="form-check-label" checked>Tidak ada</label>
                                </div>
                            </div>

                            <div class="row mb-3" id="penderita">
                                <label for="jumlah"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Penderita') }}</label>
                                <div class="col-md-6">
                                    <input type="number" id="jumlah" name="jumlah" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class='gform_page_footer top_label d-flex justify-content-end'>
                            <button type="submit" class="btn btn-primary">Lapor</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </section>

    <script>
        const penyakitRadios = document.querySelectorAll('input[name="penyakit"]');
        const penderitaDiv = document.getElementById('penderita');

        penyakitRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value !== '') {
                    penderitaDiv.classList.remove('d-none');
                } else {
                    penderitaDiv.classList.add('d-none');
                }
            });
        });
    </script>
@endsection
