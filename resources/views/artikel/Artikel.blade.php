@extends('main')
<style>
    .card-link:hover {
        text-decoration: underline
    }
</style>
@section('main_section')
    @foreach ($artikel as $item)
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{{ $item->isi }}.</p>
                    <a href="artikel/{{ $item->slug }}" class="card-link">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
