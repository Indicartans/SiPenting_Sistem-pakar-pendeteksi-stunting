@extends('landing_main')
@section('title', 'Artikel')
@section('external_assets')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <style>
        .card-link {
            color: aliceblue
        }

        .card-link:hover {
            text-decoration: underline;
            color: blue
        }

        .barista-section {
            background-color: rgb(237, 237, 237)
        }
    </style>
@endsection

@section('content')
    <section class="barista-section section-padding section-bg" id="barista-team">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                    <em class="">SiPenting</em>

                    <h2 class="">Artikel</h2>
                    <hr>
                </div>
                @foreach ($artikel as $item)
                    <div class="col-lg-3 col-md-6 col-12 mb-4">
                        <div class="team-block-wrap">
                            <div class="team-block-info d-flex flex-column">
                                <div class="d-flex mt-auto mb-3">
                                    <h4 class="text-white mb-0">{{ $item->judul }}</h4>

                                </div>

                                <p class="text-white mb-0">{{ Str::words($item->isi, '5') }}</p>
                                <a href="artikel/{{ $item->slug }}" class="card-link">Lihat
                                    Selengkapnya... </a>
                            </div>

                            <div class="team-block-image-wrap" style="height: 25rem">
                                <img src="{{ asset('storage/' . $item->url_gambar) }}" class="team-block-image img-fluid"
                                    alt="">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
{{-- @section('external_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection --}}
