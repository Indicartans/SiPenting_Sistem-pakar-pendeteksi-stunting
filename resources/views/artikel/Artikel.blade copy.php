@extends('main')
@section('title', 'Artikel')
<style>
    .card-link:hover {
        text-decoration: underline
    }

    .card-custom {
        height: 18rem;
        background-size: cover;
        background-position: center;
        color: white;
        /* Mengatur warna teks default menjadi putih */
        position: relative;

    }

    .card-custom .card-body {
        background-color: rgba(0, 0, 0, 0.5);
        /* Overlay hitam semi-transparan */
        /* position: absolute; */
        /* bottom: 0; */
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1rem;
    }

    .card-custom .card-title,
    .card-custom .card-text,
    .card-custom .card-link {
        color: rgb(232, 229, 229);
        text-shadow: 0 0 15px black
            /* Mengatur warna teks menjadi putih untuk keterbacaan */
    }

    .card-custom .card-title {
        font-weight: 700;
        color: rgb(255, 255, 255)
    }

    .card-custom .card-text {
        font-weight: 400
    }

    .card-custom .card-link {
        font-weight: 100;
        color: rgb(242, 240, 234)
    }
</style>
@section('main_section')
    <div class="container">
        <div class="row">
            @foreach ($artikel as $item)
                <div class="col-md-4 mb-4">
                    <div class="card rounded card-custom"
                        style="background-image: url('{{ asset('storage/' . $item->url_gambar) }}');">
                        <div class="card-body rounded">
                            <div>
                                <h5 class="card-title">{{ $item->judul }}</h5>
                            </div>
                            <div class="mt-auto">
                                <p class="card-text">{{ Str::words($item->isi, 8) }}.</p>
                                <a href="artikel/{{ $item->slug }}" class="card-link">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
