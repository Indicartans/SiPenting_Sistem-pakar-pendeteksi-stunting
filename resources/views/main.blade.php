<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="assets/img/sipenting-sm.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- bootsrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel='stylesheet' id='dashicons-css' href='depresi-assets/wp-includes/css/dashicons.min6a4d.css?ver=6.1.1'
        media='all' />
    <link rel="stylesheet" media="print" onload="this.onload=null;this.media='all';" id="ao_optimized_gfonts"
        href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700,italic300,italic400,italic600,italic700%7CNoto+Sans:400,700,italic400,italic700&amp;display=swap" />
    {{-- external assets --}}

    {{-- pie chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- import gemini AI --}}
    <script type="importmap">
        {
          "imports": {
            "@google/generative-ai": "https://esm.run/@google/generative-ai"
          }
        }
    </script>

    <script type="module">
        import {
            GoogleGenerativeAI
        } from "@google/generative-ai";

        // Fetch your API_KEY
        const API_KEY = "AIzaSyCR13LBs3jJ1RyAivYhdhW5jSv3gGfXpGY";

        // Access your API key (see "Set up your API key" above)
        const genAI = new GoogleGenerativeAI(API_KEY);

        const model = genAI.getGenerativeModel({
            model: "gemini-1.5-flash"
        });
    </script>

    @yield('external_assets')

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <style>
        body {
            background-color: #ffffff
        }

        .navbar-nav .nav-link {
            color: #055596;
            position: relative;
            text-decoration: none;
            font-weight: 700;
            font-family: "Montserrat", Arial, Helvetica, sans-serif;
            /* padding-bottom: 5px; */
            /* Add some padding to make space for the line */
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            /* Adjust the height of the line */
            background-color: #f2ad24;
            transition: width 0.3s ease;
        }

        .navbar-nav .nav-link:hover::after {
            width: 50%;
        }

        .navbar-nav .nav-link.active::after {
            width: 50%;
            /* If you want the active link to always show the line */
        }

        footer {
            font-size: 0.7rem;
        }

        p a {
            font-family: "Noto Sans", Arial, Helvetica, sans-serif;
            font-weight: 400;
            color: #404141;
        }

        p a:hover {
            text-decoration: underline
        }
    </style>
</head>

<body>
    @guest
        <nav class="navbar navbar-expand-lg navbar-light p-4">
            <div class="container">
                <a class="navbar-brand" id="logo" href="/">
                    <img src="/landing/img/SiPenting-logo.png" alt="SiPenting Logo" class="img-fluid"
                        style="max-height: 50px;" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/form-faq">Diagnosa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endguest

    @yield('main_section')
    @guest
        <footer class="nav justify-content-center p-4 bg-dark text-center text-sm">
            <p class="text-light ">© 2024 SiPenting. Developed by <a href="https://instagram.com/alfaindicadz"
                    class="text-light" target="blank">Alfa Indica Dzoriful Khazim</a> & <a
                    href="https://www.instagram.com/wahyuindra11_/" class="text-light" target="blank">Wahyu Indra
                    Permana</a></p>
        </footer>
    @endguest

    @auth
        <footer class="nav justify-content-center p-4 bg-light text-center text-sm">
            <p class="text-dark ">© 2024 SiPenting. Developed by <a href="https://instagram.com/alfaindicadz"
                    class="text-dark" target="blank">Alfa Indica Dzoriful Khazim</a> & <a
                    href="https://www.instagram.com/wahyuindra11_/" class="text-dark" target="blank">Wahyu Indra
                    Permana</a></p>
        </footer>
    @endauth

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- external js assets --}}
    @yield('js_external_assets')



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var toggleSidebarBtn = document.querySelector(".toggle-sidebar-btn");
            var sidebar = document.getElementById("sidebar");

            toggleSidebarBtn.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });
        });
    </script>

</body>

</html>
