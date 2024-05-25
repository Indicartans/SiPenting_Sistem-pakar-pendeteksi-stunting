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


    @yield('external_assets')

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

</head>

<body>
    @yield('main_section')

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
