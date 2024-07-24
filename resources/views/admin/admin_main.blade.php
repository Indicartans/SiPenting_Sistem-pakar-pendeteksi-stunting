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
@endsection
