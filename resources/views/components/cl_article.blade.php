<style>
    body {
        background-color: #f4f4f4
    }

    .article img {
        width: 100%;
        height: auto;
    }
</style>

<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-lg-5 col-md-6 mb-4 mx-auto card">
            <div class="article p-4 d-flex flex-column align-items-center">
                {{-- <img src="{{ $artikel->url_gambar }}" alt="depresi-img" class="p-3 border border-primary mb-3 img-fluid"> --}}
                <div class="text-justify">
                    <h2 class="mx-auto my-2">{{ $artikel->judul }}</h2>
                    <p class="my-2 py-2">{{ $artikel->isi }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 mb-4 mx-auto card">
            <div class="article  p-4 d-flex flex-column align-items-center">
                {{-- <img src="{{ $artikel->url_gambar }}" alt="depresi-img"
                    class="p-3 border border-primary mb-3 img-fluid"> --}}
                <div class="text-justify">
                    <h2 class="mx-auto my-2">Saran</h2>
                    <p class="my-2 py-2">{{ $artikel->isi }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
