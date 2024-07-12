<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap" />
    <link rel="shortcut icon" href="assets/img/sipenting-sm.png">
    <link rel="icon" href="assets/img/sipenting-sm.png">
    <meta name="theme-color" content="#365888">
    <title>Diagnosa Stunting</title>
    <link rel="stylesheet"
        href="depresi-assets/wp-content/cache/autoptimize/css/autoptimize_7a1ecf2654b585c47ef39ad343596e82.css"
        media="all" />
    <link rel="stylesheet"
        href="depresi-assets/wp-content/cache/autoptimize/css/autoptimize_5653ccbbff2bf3fde17022871919df8b.css"
        media="print" />
    <style>
        .question {
            display: none;
        }

        .question.active {
            display: block;
            animation: fadeInOut 1.5s;
        }

        .btn-prev {
            border-radius: 20px 0px 20px 20px;
        }

        @keyframes fadeInOut {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;

            }
        }
    </style>
</head>

<body class="screen-template-default single single-screen postid-22 not-front">
    <div id="page" class="site">
        <header id="header" class="clearfix">
            <div class="container bg-black">
                <div class="row align-items-center d-flex justify-content-between">
                    <div class="col-auto">
                        <a id="logo" href="/"><img src="/landing/img/SiPenting-logo.png" alt="SiPenting Logo"
                                class="img-fluid" /></a>
                    </div>
                    <div class="col">
                        <nav id="navigation" class="main-navigation" role="navigation" aria-label="Top Menu">
                            <div class="menu-main-menu-container">
                                <ul id="main-menu" class="sf-menu d-flex justify-content-end">
                                    <li id="menu-item-405"
                                        class="heading menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-405">
                                        <a href="/">Home</a>
                                    </li>
                                    <li id="menu-item-405"
                                        class="heading menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-405">
                                        <a href="/artikel">Artikel</a>
                                    </li>
                                    <li id="menu-item-404"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-404">
                                        <a href="about">About</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>



        <main id="content" class="site-content">
            <article id="post-22" class="post-22 screen type-screen status-publish hentry condition-depression">
                <div class="wrap normal">
                    <div class="page-heading plain">
                        <h1 class="entry-title text-center">Diagnosa Stunting</h1>
                    </div>
                </div>
                @if (session('error_message'))
                    <div class="alert alert-danger text-center">
                        {{ session('error_message') }}
                    </div>
                @endif
                <div class="wrap medium">
                    <div class="page-intro">
                        <form method='post' enctype='multipart/form-data' id='gform_1'
                            action="{{ route('spk.store') }}">
                            @csrf
                            <div class='gform_body gform-body'>
                                <div class='gform_page' id='gform_page_1_1'>
                                    <div class='gform_page_fields'>
                                        <ul id='gform_fields_1'
                                            class='gform_fields top_label form_sublabel_below description_above'>
                                            <li id="field_1_4"
                                                class="gfield gfield_html gfield_html_formatted gfield_no_follows_desc field_sublabel_below field_description_above gfield_visibility_visible"
                                                data-js-reload="field_1_4">
                                                <p><strong>Dari beberapa gejala di bawah ini</strong>, gejala mana yang
                                                    kemungkinan terjadi pada anak anda?</p>
                                                <p>Tidak semua Pertanyaan harus dijawab, jadi pastikan untuk memberikan
                                                    jawaban
                                                    yang tepat sesuai dengan yang terjadi pada anak anda.</p>
                                            </li>
                                            @foreach ($gejala as $item)
                                                <li id="field_{{ $loop->iteration }}"
                                                    class="gfield question gfield_contains_required field_sublabel_below field_description_above gfield_visibility_visible"
                                                    data-js-reload="field_{{ $loop->iteration }}">
                                                    <label class='gfield_label'>{{ $loop->iteration }}. Apakah anda
                                                        merasa anak anda {{ $item->gejala }}?<span
                                                            class="gfield_required"><span
                                                                class="gfield_required gfield_required_asterisk">*</span></span></label>
                                                    <div class='ginput_container ginput_container_radio'>
                                                        <ul class='gfield_radio' id='input_{{ $loop->iteration }}'>
                                                            @foreach ($kondisi_user as $kondisi)
                                                                <li style='font-size: 14px;'
                                                                    class='gchoice gchoice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'>
                                                                    <input name='input_{{ $loop->parent->iteration }}'
                                                                        type='radio' value='{{ $kondisi->nilai }}'
                                                                        id='choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'
                                                                        onchange="document.getElementById('kondisi_{{ $item->kode_gejala }}{{ $loop->parent->iteration }}').value = this.value; nextQuestion()"
                                                                        @if ($kondisi->id == 1) checked @endif />
                                                                    <label
                                                                        for='choice_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'
                                                                        id='label_{{ $loop->parent->iteration }}_{{ $loop->iteration }}'>{{ $kondisi->kondisi }}</label>
                                                                </li>
                                                            @endforeach
                                                            <input type="hidden"
                                                                name="kondisi[{{ $item->kode_gejala }}]"
                                                                id="kondisi_{{ $item->kode_gejala }}{{ $loop->iteration }}"
                                                                value="" />
                                                        </ul>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="gform_page_footer top_label">
                                            <button type="button" id="prev-button" class="btn-prev">Kembali</button>
                                            <button type="button" id="next-button"
                                                class="gform_next_button button">Lanjut</button>
                                            <button type="submit" id="submit-button"
                                                class="gform_next_button button"
                                                style="display: none;">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </article>
        </main>
        <footer id="footer" class="clear bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 rights my-3 text-light text-center">
                        <p>© 2024 SiPenting. Developed by <a href="https://instagram.com/alfaindicadz"
                                class="text-light" target="blank">Alfa Indica Dzoriful Khazim</a> & <a
                                href="https://www.instagram.com/wahyuindra11_/" class="text-light"
                                target="blank">Wahyu Indra Permana</a></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menangkap semua klik di dalam dokumen
            document.addEventListener('click', function(event) {
                // Periksa apakah yang diklik adalah pesan error
                var errorMessage = document.querySelector('.alert-danger');

                // Jika pesan error ada dan klik dilakukan di luar pesan error
                if (errorMessage && !errorMessage.contains(event.target)) {
                    errorMessage.remove(); // Hapus pesan error
                }
            });
        });

        $(document).ready(function() {
            let currentQuestion = 0;
            const questions = $('.question');
            const totalQuestions = questions.length;

            function showQuestion(index) {
                questions.removeClass('active');
                $(questions[index]).addClass('active');
                $('#prev-button').toggle(index > 0);
                $('#next-button').toggle(index < totalQuestions - 1);
                $('#submit-button').toggle(index === totalQuestions - 1);
            }

            $('#next-button').click(function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion);
                }
            });

            $('#prev-button').click(function() {
                if (currentQuestion > 0) {
                    currentQuestion--;
                    showQuestion(currentQuestion);
                }
            });

            window.nextQuestion = function() {
                if (currentQuestion < totalQuestions - 1) {
                    currentQuestion++;
                    showQuestion(currentQuestion);
                }
            };

            showQuestion(currentQuestion);
        });
    </script>
</body>

</html>
