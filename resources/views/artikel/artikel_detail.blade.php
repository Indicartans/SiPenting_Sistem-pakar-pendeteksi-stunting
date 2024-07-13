@extends('landing_main')

@section('title', 'Artikel')

@section('external_assets')

@endsection

@section('content')
    <section class="barista-section section-padding section-bg" id="barista-team">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $artikel->judul }}</h5>
                    <div class="card-img-top-wrapper rounded">
                        <img src="{{ asset('storage/' . $artikel->url_gambar) }}" class="card-img-top mb-3 rounded img-fluid"
                            alt="{{ $artikel->judul }}">
                    </div>
                    <p class="card-text">{{ $artikel->isi }}</p>

                    <h6 class="fw-bold mt-4">Gejala</h6>
                    <ul>
                        @foreach ($gejala as $item)
                            <li class="gejala">{{ $item->kode_gejala }}</li>
                        @endforeach
                    </ul>

                    <h6 class="fw-bold mt-4">Saran</h6>
                    <p>{{ $artikel->saran }}</p>
                    <hr>

                    <h4 class="fw-bold my-4 text-center" style="color: #055596">Temukan Layanan Kesehatan di Sekitar Anda
                    </h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31675.797911946986!2d110.44994240053528!3d-7.070825458573365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srumah%20sakit%20terdekat!5e0!3m2!1sid!2sid!4v1720360062379!5m2!1sid!2sid"
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('artikel.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('external_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
