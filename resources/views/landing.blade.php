<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="utf-8">
    <title>SiPenting</title>
    <meta name="description" content="Professional Creative Template" />
    <meta name="author" content="IG Design">
    <meta name="keywords"
        content="ig design, website, design, html5, css3, jquery, creative, clean, animated, portfolio, blog, one-page, multi-page, corporate, business," />

    <!-- Mobile Specific Metas
 ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#212121" />
    <meta name="msapplication-navbutton-color" content="#212121" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#212121" />

    {{-- web logo --}}
    <link rel="icon" href="assets/img/sipenting-sm.png" type="image/png">

    <!-- Web Fonts
 ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- CSS
 ================================================== -->
    <link rel="stylesheet" href="landing/css/bootstrap.min.css" />
    <link rel="stylesheet" href="landing/css/font-awesome.min.css" />
    <link rel="stylesheet" href="landing/css/style.css" />
    <link rel="stylesheet" href="landing/css/colors/color.css" />
    <link rel="stylesheet" href="landing/css/ionicons.min.css" />
    <link rel="stylesheet" href="landing/css/owl.carousel.css" />
    <link rel="stylesheet" href="landing/css/owl.transitions.css" />

    <!-- Favicons
 ================================================== -->
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-114x114.png">


</head>

<body class="royal_preloader">

    <!-- <div id="royal_preloader"></div> -->


    <!-- Nav and Logo
 ================================================== -->


    <!-- MENU
    ================================================== -->

    <nav id="menu-wrap" class="menu-back cbp-af-header">
        <div class="menu">
            <a href="/">
                <div class="logo"></div>
            </a>
            <ul>
                <li>
                    <a class="shadow-hover" href="/dashboard">Dashboard</a>
                </li>
                <li>
                    <a class="shadow-hover" href="#">Menu</a>
                    <ul>
                        <li><a href="/form-faq">Diagnosa</a></li>
                        <li><a href="/gejala">Gejala</a></li>
                        <li><a href="/depresi">Depresi</a></li>
                    </ul>
                </li>
                <li>
                    <a class="shadow-hover" href="/artikel">Artikel</a>
                </li>
                <li>
                    <a class="shadow-hover" href="#faq">FAQ</a>
                </li>
                <li>
                    <a class="shadow-hover" href="#kontak">Kontak</a>
                </li>

                @guest()
                    <li>
                        <a class="shadow-hover" href="/login">Login</span></a>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <!-- Primary Page Layout
 ================================================== -->

    <main>

        <!-- Hero Section -->

        <div class="section full-height mob-height">
            <div class="background-parallax" style="background-image: url('landing/img/full-2.jpg')"
                data-enllax-ratio=".5" data-enllax-type="background" data-enllax-direction="vertical"></div>
            <div class="hero-center-text-wrap">
                <div class="container text-left">
                    <div class="row">
                        <div class="col-md-12">

                            <br>
                            <h1 class="parallax-fade-top-2 typed">Cek kesehatan <strong>Gizi Anak Anda</strong>
                                Sekarang!<br><span id="typed-1"></span></h1>
                            <br>
                            <style>
                                .btn-glow:hover {
                                    box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
                                    transition: box-shadow 0.5s;
                                }
                            </style>
                            <div style="margin-left: 12px">

                                <a href="/form-faq" class="btn btn-dark btn-glow" role="button"
                                    style="color: rgb(218, 116, 22);">
                                    Diagnosa Sekarang!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->

        <div class="section padding-top-bottom-big background-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <div id="owl-sep-1" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="quote">
                                    <p class="lead">"SiPenting adalah aplikasi yang dirancang untuk membantu orang
                                        tua dalam mendeteksi potensi stunting pada anak dengan
                                        menyediakan sebuah sistem pakar yang memungkinkan pengguna untuk mengukur risiko
                                        stunting. Kami percaya bahwa mendeteksi dini potensi stunting adalah langkah
                                        penting dalam mencegah dampak jangka panjangnya pada pertumbuhan dan
                                        perkembangan anak. Selain itu, kami juga menyediakan informasi dan sumber daya
                                        yang berguna untuk membantu orang tua dalam mengelola serta
                                        mengatasi risiko stunting pada anak."</p>
                                    <h6>
                                        <h6>&rarr;</h6>
                                    </h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <p class="lead">"Ingatlah bahwa SiPenting bukanlah pengganti layanan
                                        profesional, jadi pastikan untuk selalu mencari bantuan medis yang tepat jika
                                        Anda mengalami gejala depresi."</p>
                                    <h6>&rarr;</h6>
                                </div>
                            </div>
                            <div class="item">
                                <div class="quote">
                                    <p class="lead">"Kami membuat SiPenting untuk membantu
                                        orang tua supaya dapat mengawasi pertumbuhan gizi pada anak sehingga dapat
                                        mencegah terjadi nya stunting."</p>
                                    <h6>&rarr;</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section padding-top-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="full-line"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section id="faq" class="bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-5">Pertanyaan yang Sering Diajukan - FAQ</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu SiPenting?
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <div class="card-body">
                                SiPenting adalah sebuah situs yang membantu orangtua mengukur terjadinya stunting pada
                                anak dengan mengisi formulir pertanyaan. Kami menyediakan solusi yang sesuai setelah
                                orangtua mengisi formulir tersebut.
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah hasil dari SiPenting dapat diandalkan?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#faqAccordion">
                            <div class="card-body">
                                Hasil dari SiPenting adalah sebuah estimasi dari tingkat terjadinya stunting pada anak,
                                dan tidak
                                bisa dianggap sebagai diagnosis yang pasti. Kami sangat menyarankan agar tetap meminta
                                bantuan kepada seorang yang profesional seperti ahli gizi atau dokter anak.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana cara mengakses solusi yang ditawarkan SiPenting?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#faqAccordion">
                            <div class="card-body">
                                Setelah mengisi formulir, Pengguna akan menerima rekomendasi solusi sesuai dengan
                                penyakitS yang terdeteksi. Kami juga menyediakan tautan ke sumber informasi dan
                                bantuan profesional yang dapat membantu orangtua mengatasi penyakit yang terjadi pada
                                anak.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <div class="section footer padding-top-big background-image-cover"
            style="background-image: url(img/footer.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <ul class="footer-social">
                            <li>
                                <a href="#">Tw</a>
                            </li>
                            <li>
                                <a href="#">Fb</a>
                            </li>
                            <li>
                                <a href="#">G+</a>
                            </li>
                            <li>
                                <a href="#">Vm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="footer-line"></div>
                    </div>
                    <div class="col-md-12 rights my-3">
                    </div>
                </div>
            </div>
        </div>

    </main>


    <!-- JAVASCRIPT -->
    <script src="landing/js/jquery.js"></script>
    <script src="landing/js/royal_preloader.min.js"></script>
    <script src="landing/js/popper.min.js"></script>
    <script src="landing/js/bootstrap.min.js"></script>
    <script src="landing/js/plugins.js"></script>
    <script src="landing/js/custom.js"></script>
    <script>
        // Type text

        var typed = new Typed('#typed-1', {
            strings: ['Deteksi', 'Pahami', 'Atasi'],
            typeSpeed: 45,
            backSpeed: 0,
            startDelay: 200,
            backDelay: 2200,
            loop: true,
            loopCount: false,
            showCursor: false,
            // cursorChar: "_",
            attr: null
        });
    </script>
</body>

</html>
