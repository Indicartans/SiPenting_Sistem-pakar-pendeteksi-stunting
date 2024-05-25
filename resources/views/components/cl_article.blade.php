<style>
    .article img {
        width: 100%;
        height: auto;
        /* margin: auto; */
    }
</style>

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="my-4 article border border-warning p-4 d-flex flex-column flex-md-column align-items-start">
            <img src="{{ $artikel->url_gambar }}" alt="depresi-img" class="p-3 border border-primary mb-3 img-fluid">
            <div>
                <h2 class="mx-auto my-2">{{ $artikel->judul }}</h2>
                <p class="my-2 py-2">{{ $artikel->isi }}</p>
            </div>
        </div>
    </div>
</div>
