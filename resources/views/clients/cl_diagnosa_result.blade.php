@extends('landing_main')

@section('title', 'Hasil Diagnosa')

@section('external_assets')
    <style>
        p {
            color: black
        }

        .card-link:hover {
            color: blue;
            text-decoration: underline
        }
    </style>
@endsection

@section('content')
    <section class="barista-section section-padding section-bg m-0" id="barista-team">
        <div class="container">
            <div class="row mx-auto my-4">

                {{-- section 3 --}}
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="card my-4">
                            <div class="card-header">
                                Hasil Diagnosa
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Gejala yang dialami</th>
                                            @auth
                                                <th scope="col">CF User</th>
                                            @endauth
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gejala_by_user as $key)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="gejala">{{ $key[0] }}</td>
                                                @auth
                                                    <td class="gejala">{{ $key[1] }}</td>
                                                @endauth
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h5 class="fw-semibold">Data Anak</h5>
                                {{-- @php
                                    dd($data_anak);
                                @endphp --}}
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Data</th>
                                            <th scope="col">Isi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nama Orangtua</td>
                                            <td>{{ $data_anak['nama_orangtua'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Anak</td>
                                            <td>{{ $data_anak['nama_anak'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Usia</td>
                                            <td>{{ $data_anak['usia'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kontak</td>
                                            <td>{{ $data_anak['kontak'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $data_anak['alamat'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="fw-semibold">Berdasarkan dari gejala yang anda isikan dapat disimpulkan bahwa anak
                                    anda
                                    memiliki penyakit
                                    <span class="fw-bold fs-4">{{ $diagnosa_dipilih['kode_depresi']->depresi }}</span>
                                    dengan
                                    tingkat kepastian
                                    yaitu
                                    <span class="fw-bold fs-4">{{ round($hasil['value'] * 100, 2) }}</span> %
                                </p>
                                {{-- @endguest --}}
                                <div class="text-justify">
                                    <h5 class="mx-auto my-1 fw-semibold">Detail</h5>
                                    <p class="fw-semibold my-2 py-2">{{ $artikel->isi }}</p>
                                </div>
                                <div class="text-justify">
                                    <h5 class="mx-auto my-1 fw-semibold">Saran</h5>
                                    <p class="fw-semibold my-2 py-2">{{ $artikel->saran }}</p>
                                </div>
                                <div class="text-justify">
                                    {{-- <h5 class="mx-auto my-1 fw-semibold">Saran</h5> --}}
                                    {{-- <p class="my-2 py-2 card-link"></p> --}}
                                    <a href="/artikel/{{ $artikel->slug }}" class="card-link my-2 py-2">Ketahui lebih
                                        lanjut
                                        tentang
                                        <span class="fw-semibold">{{ $artikel->judul }}</span></a>
                                </div>
                                <div>
                                    @auth
                                        <a style="align-content: flex-end" href="/dashboard" class="btn btn-primary my-4">
                                            KEMBALI</a>
                                    @endauth
                                    @guest
                                        <a style="align-content: flex-end" href="/" class="btn btn-primary my-4">
                                            KEMBALI</a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @include('components.cl_article') --}}

            </div>
        </div>
    </section>
@endsection

@section('external_js')
    <script>
        // Data mapping dari kode ke deskripsi gejala
        const gejalaDescriptions = {
            "G003": "Sering sakit",
            "G005": "Pada usia 6 bulan gigi belum tumbuh",
            "G006": "Tidak bisa menerima pelajaran dengan baik",
            "G007": "Anak jadi lebih pendiam dan tidak banyak melakukan kontak mata dengan orang sekitar pada umur 8-10 tahun",
            "G009": "Pada usia 1-5 tahun berat badan lebih dari 20kg",
            "G012": "Nafsu makan rendah",
            "G013": "Skala tubuh terlihat lebih kecil",
            "G014": "Sering sakit dan memerlukan waktu yang lama untuk pulih",
            "G015": "Mudah lelah",
            "G016": "Sanitasi yang buruk",
            "G017": "Kulit dan rambut kering",
            "G018": "Kehilangan lemak dan massa otot tubuh",
            "G019": "Sering diare",
            "G020": "Mudah marah",
            "G021": "Rambut mudah rontok",
            "G022": "Menurunnya perkembangan kognitif",
            "G023": "Terhalanganya pertumbuhan dan kecerdasan",
            "G024": "Sakit kepala",
            "G025": "Sering lapar",
            "G026": "Badan kurus",
            "G027": "Muka terlihat tua",
            "G028": "Pada usia 1-5 tahun berat badan kurang dari 10kg",
            "G029": "Mudah menangis",
            "G030": "Otot-otot melemah",
            "G031": "Kulit terlihat keriput",
            "G032": "Pembengkakan pada tungkai, kaki, tangan, beserta muka",
            "G033": "Bintik dan bersisik pada kulit",
            "G034": "Perut makin mengembung",
            "G035": "Infeksi yang lebih sering dan parah disebabkan sistem kekebalan tubuh yang rusak",
            "G036": "Tanda jari membekas di kulit saat ditekan",
            "G002": "Tinggi badan kurang dari 70 cm",
            "G008": "Tinggi badan kurang dari 80 cm"
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
