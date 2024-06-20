@extends('main')
<style>
    .card-link:hover {
        text-decoration: underline
    }
</style>
@section('main_section')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $artikel->judul }}</h5>

                {{-- Tambahkan gambar jika dibutuhkan --}}
                {{-- <img src="{{ $artikel->url_gambar }}" class="card-img-top" alt="{{ $artikel->judul }}"> --}}

                <p class="card-text">{{ $artikel->isi }}</p>

                <h6 class="fw-bold mt-4">Gejala</h6>
                <ul>
                    @foreach ($gejala as $item)
                        <li class=" gejala">{{ $item->kode_gejala }}</li>
                    @endforeach
                </ul>

                <h6 class="fw-bold mt-4">Saran</h6>
                <p>{{ $artikel->saran }}</p>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('artikel.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>


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
