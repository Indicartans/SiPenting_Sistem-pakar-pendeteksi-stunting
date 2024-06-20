@extends('clients.cl_main')
@section('title', 'Form Diagnosa')

@section('cl_content')
    <div class="container">
        <div class="row mx-auto my-4">
            @auth
                <div class="col-lg-10 mx-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Diagnosa ID</th>
                                <th scope="col">Tingkat Depresi</th>
                                <th scope="col">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $diagnosa->diagnosa_id }}</td>
                                <td> {{ $diagnosa_dipilih['kode_depresi']->kode_depresi }} |
                                    {{ $diagnosa_dipilih['kode_depresi']->depresi }}</td>
                                <td>{{ $diagnosa_dipilih['value'] * 100 }} %</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- section 2 --}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="d-flex ">
                            {{-- Pakar --}}
                            <table class="table table-hover mt-lg-5 border border-primary p-3 mx-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Pakar</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Nilai (MB - MD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pakar as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $item->kode_gejala }} | {{ $item->kode_depresi }}
                                            </td>
                                            <td>{{ $item->mb - $item->md }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- User --}}
                            <table class="table table-hover mt-lg-5 border border-danger p-3 mx-3">
                                <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gejala_by_user as $key)
                                        <tr>
                                            <td>{{ $key[0] }}</td>
                                            <td>{{ $key[1] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- Tabel Cf Gabungan --}}
                            {{-- CF Gabungan --}}
                            <table class="table table-hover mt-lg-5 border border-info p-3 mx-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Hasil</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cf_kombinasi['cf'] as $key)
                                        <tr>
                                            <td>{{ $key }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endauth


            {{-- section 3 --}}
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card my-4">
                        <div class="card-header">
                            Hasil Diagnosa
                        </div>
                        <div class="card-body">
                            @auth
                                <h5 class="card-title">

                                    {{ $diagnosa_dipilih['kode_depresi']->kode_depresi }} |
                                    {{ $diagnosa_dipilih['kode_depresi']->depresi }}

                                    {{-- {{ $diagnosa_dipilih['kode_depresi']->depresi }} --}}
                                </h5>

                                <p class="card-text">Jadi dapat disimpulkan bahwa pasien mengalami penyakit
                                    <span class="fw-semibold">{{ $diagnosa_dipilih['kode_depresi']->depresi }}</span>
                                    dengan tingkat kepastian yaitu <span
                                        class="fw-semibold fs-4">{{ round($hasil['value'] * 100, 2) }}</span> %
                                </p>
                            @endauth
                            @guest
                                <p class="card-text">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gejala yang dialami</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gejala_by_user as $key)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="gejala">{{ $key[0] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                Berdasarkan dari gejala yang anda isikan dapat disimpulkan bahwa anak anda
                                memiliki penyakit <span
                                    class="fw-semibold fs-4">{{ $diagnosa_dipilih['kode_depresi']->depresi }}</span> dengan
                                tingkat kepastian
                                yaitu <span class="fw-semibold fs-4">{{ round($hasil['value'] * 100, 2) }}</span> %</p>
                            @endguest
                            <div class="text-justify">
                                <h5 class="mx-auto my-1 fw-semibold">Detail</h5>
                                <p class="my-2 py-2">{{ $artikel->isi }}</p>
                            </div>
                            <div class="text-justify">
                                <h5 class="mx-auto my-1 fw-semibold">Saran</h5>
                                <p class="my-2 py-2">{{ $artikel->isi }}</p>
                            </div>
                            <div>
                                @auth
                                    <a style="align-content: flex-end" href="/dashboard" class="btn btn-primary"> KEMBALI</a>
                                @endauth
                                @guest
                                    <a style="align-content: flex-end" href="/" class="btn btn-primary"> KEMBALI</a>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @include('components.cl_article') --}}

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
