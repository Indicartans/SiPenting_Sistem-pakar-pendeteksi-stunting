<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="assets\img\sipenting-sm.png" class="navbar-brand-image img-fluid" alt="Barista Cafe Template">
            SiPenting
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ Request::is('/') ? 'active' : 'inactive' }}"
                        href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link click-scroll {{ Request::is('artikel') ? 'active' : 'inactive' }}"
                        href="/artikel">Artikel</a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link click-scroll" href="#faq">FAQ</a>
                </li> --}}

                <li class="nav-item">
                    <a class="nav-link click-scroll {{ Request::is('/#section_4') ? 'active' : 'inactive' }}"
                        href="#section_4">About</a>
                </li>
            </ul>

            <div class="ms-lg-3">
                <a class="btn custom-btn custom-border-btn {{ Request::is('form-faq') ? 'active' : 'inactive' }}"
                    href="/form-faq">
                    Diagnosa
                    <i class="bi bi-search-heart"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
