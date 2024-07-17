@extends('landing_main')

@section('title', 'Artikel')

@section('external_assets')
    <style>
        .card {
            box-shadow: 0 0 50px #808080
        }

        @media (min-width: 1024px) {
            .card-img-top {
                max-width: 50%;
                height: auto
            }
        }
    </style>
@endsection

@section('content')
    <section class="barista-section section-padding section-bg" id="barista-team">
        <div class="container mt-5">
            <div class="container">
                <div class="card" style="border: none">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center fs-1 my-2">{{ $artikel->judul }}</h5>
                        <hr>
                        <div class="container" style="">
                            <div class="card-img-top-wrapper rounded d-flex justify-content-center">
                                <img src="{{ asset('storage/' . $artikel->url_gambar) }}"
                                    class="card-img-top mb-3 rounded img-fluid" alt="{{ $artikel->judul }}">
                            </div>
                        </div>

                        <p class=" fw-normal" style="color: black">{{ $artikel->isi }}</p>

                        <h6 class="fw-semibold mt-4">Gejala</h6>
                        <ul>
                            @foreach ($gejala as $item)
                                <li class="gejala fw-normal" style="color: black">{{ $item->kode_gejala }}</li>
                            @endforeach
                        </ul>

                        <h6 class="fw-semibold mt-4">Saran</h6>
                        <p class="fw-normal" style="color: black">{{ $artikel->saran }}</p>
                        <hr>

                        <h4 class="fw-semibold my-4 text-center" style="color: #055596">Temukan Layanan Kesehatan di Sekitar
                            Anda
                        </h4>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d31675.797911946986!2d110.44994240053528!3d-7.070825458573365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1srumah%20sakit%20terdekat!5e0!3m2!1sid!2sid!4v1720360062379!5m2!1sid!2sid"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="card-footer text-end">
                        <a href="{{ route('artikel.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('external_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        // Data mapping dari kode ke deskripsi gejala
        const gejalaDescriptions = {
            "G001": "Jika dibandingkan dengan anak seusianya tinggi badannya paling pendek",
            "G002": "Pertumbuhan tulang terhambat",
            "G003": "Terserang berbagai penyakit infeksi",
            "G004": "Wajah tampak lebih muda dari anak seusianya",
            "G005": "Pertumbuhan gigi terhambat",
            "G006": "Memori belajar yang kurang baik",
            "G007": "Anak jadi lebih pendiam dan tidak banyak melakukan kontak mata dengan orang sekitar pada umur 8-10 tahun",
            "G008": "Pubertas terlambat",
            "G009": "Kelebihan berat badan",
            "G010": "Obesitas",
            "G011": "Badan Gemuk",
            "G012": "Nafsu makan rendah",
            "G013": "Skala tubuh cenderung normal namun balita terlihat lebih muda/kecil untuk usianya",
            "G014": "Sering sakit dan memerlukan waktu yang lama untuk pulih",
            "G015": "Keletihan akut",
            "G016": "Sanitasi yang buruk",
            "G017": "Kulit dan rambut kering",
            "G018": "Kehilangan lemak dan massa otot tubuh",
            "G019": "Diare kronis",
            "G020": "Mudah marah",
            "G021": "Rambut rangup dan gampang tanggal",
            "G022": "Menurunnya perkembangan kognitif",
            "G023": "Terhalanganya perutumbuhan psikis, kecerdasan",
            "G024": "Sakit kepala",
            "G025": "Selalu lapar",
            "G026": "Badan tampak semakin ramping",
            "G027": "Muka terlihat tua",
            "G028": "Berat badan menurun",
            "G029": "Mudah menangis",
            "G030": "Otot-otot melemah",
            "G031": "Kulit terlihat keriput",
            "G032": "Edema (pembengkakan) pada tungkai, kaki, tangan, beserta muka",
            "G033": "Bintik dan bersisik pada kulit",
            "G034": "Perut makin mengembung",
            "G035": "Infeksi yang lebih sering dan parah disebabkan sistem kekebalan tubuh yang rusak",
            "G036": "Tanda jari membekas di kulit saat disentuh"
        };

        // Ambil semua elemen dengan class 'gejala'
        const gejalaElements = document.querySelectorAll('.gejala');

        if (gejalaElements.innerText = "G001") {
            gejalaElements.innerText = "CEK"
        }

        // Loop melalui setiap elemen dan ganti teksnya
        gejalaElements.forEach(element => {
            const code = element.innerText.trim(); // Ambil teks asli (kode gejala) dan hilangkan spasi tambahan
            if (gejalaDescriptions[code]) {
                element.innerText = gejalaDescriptions[code]; // Ganti teks dengan deskripsi
            }
        });
    </script>
@endsection
