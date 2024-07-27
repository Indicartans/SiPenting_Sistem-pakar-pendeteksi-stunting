@extends('main')

@section('main_section')
    {{-- Navbar dan header --}}
    @include('components.admin_header')

    {{-- seidebar --}}
    @include('components.admin_sidebar')

    {{-- isi --}}
    <main>
        @yield('admin_content')
    </main>
@endsection

@section('js_external_assets')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toggleSidebarBtn = document.querySelector(".toggle-sidebar-btn");
            var sidebar = document.getElementById("sidebar");

            toggleSidebarBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });
        });
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function update(id, nama, email, role) {
            const formAdmin = document.getElementById("form-edit");
            formAdmin.setAttribute("action", `/admin/${id}`);
            formAdmin.setAttribute("method", 'POST');

            document.getElementById("name").value = nama;
            document.getElementById("email").value = email;
            document.getElementById("role").value = role;
        }
    </script>
@endsection
