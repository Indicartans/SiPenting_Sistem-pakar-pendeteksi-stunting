@extends('landing_main')

@section('title', 'Diagnosa Stunting')

@section('external_assets')
    <style>
        .section-heading {
            margin-bottom: 50px;
        }

        .card-header button {
            width: 100%;
            text-align: left;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            /* Text color white */
        }

        .card-body {
            font-size: 16px;
            color: #d3c1c1;
            /* Text color white */
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
            color: #fff;
            /* Text color white */
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-prev,
        .btn-next {
            background-color: #6c757d;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
            color: #fff;
            /* Text color white */
        }

        .btn-prev:hover,
        .btn-next:hover {
            background-color: #5a6268;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Custom Styles */
        .entry-title {
            font-size: 36px;
            color: #055596;
            /* Text color white */
            margin-bottom: 20px;
        }

        .page-intro p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #000;
            /* Text color white */
        }

        .question {
            display: none;
        }

        .question.active {
            display: block;
            animation: fadeInOut 1s
        }

        @keyframes fadeInOut {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .gfield_label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
            color: #000000;
            /* Text color white */
        }

        .gfield_radio li {
            display: inline-block;
            margin-right: 10px;
        }

        .gfield_radio input[type="radio"] {
            display: none;
        }

        .gfield_radio label {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #055596;
            border-radius: 20px;
            cursor: pointer;
            color: #000000;
            /* Text color white */
        }

        .gfield_radio input[type="radio"]:checked+label {
            background-color: #055596;
            color: #fff;
        }

        .gform_page_footer {
            margin-top: 30px;
        }

        .btn-next {
            background-color: #055596;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-next:hover {
            background-color: #0076f4;
        }

        .btn-prev {
            background-color: #989898;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-prev:hover {
            background-color: #5a6268;
        }

        .btn-primary {
            display: none;
            background-color: #00a99d;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 20px;
        }

        .btn-primary:hover {
            background-color: #007bff;
        }

        .barista-section {
            height: 100vh;
            display: flex;
            /* justify-content: start; */
            align-items: center;
            /* background-color: rgb(237, 237, 237); */
        }

        .barista-section .container {
            box-shadow: 0 0 20px #e1e1e1;
        }
    </style>
@endsection

@section('content')
    <section class="barista-section section-padding section-bg m-0" id="barista-team">
        <div class="container bg-light p-4 rounded">
            <div class="wrap normal">
                <div class="page-heading plain text-center">
                    <h1 class="entry-title">Diagnosa Stunting</h1>
                </div>
            </div>
            @if (session('error_message'))
                <div class="alert alert-danger text-center">
                    {{ session('error_message') }}
                </div>
            @endif
            <div class="wrap medium">
                <div class="page-intro text-start">
                    <p><strong>Dari beberapa gejala di bawah ini</strong>, gejala mana yang kemungkinan terjadi pada anak
                        anda?</p>
                    <p>Tidak semua Pertanyaan harus dijawab, jadi pastikan untuk memberikan jawaban yang tepat sesuai dengan
                        yang terjadi pada anak anda.</p>
                </div>
                <form method='post' enctype='multipart/form-data' id='gform_1' action="{{ route('spk.store') }}">
                    @csrf
                    <div class='gform_body gform-body'>
                        <div class='gform_page' id='gform_page_1_1'>
                            <div class='gform_page_fields'>
                                <ul id='gform_fields_1'
                                    class='gform_fields top_label form_sublabel_below description_above'>
                                    @foreach ($gejala as $item)
                                        <li id="field_{{ $loop->iteration }}"
                                            class="gfield question gfield_contains_required field_sublabel_below field_description_above gfield_visibility_visible"
                                            data-js-reload="field_{{ $loop->iteration }}">
                                            <label class='gfield_label'>{{ $loop->iteration }}. Apakah anda merasa anak anda
                                                {{ $item->gejala }}?</label>
                                            <div class='ginput_container ginput_container_radio'>
                                                <ul class='gfield_radio' id='input_{{ $loop->iteration }}'>
                                                    @foreach ($kondisi_user as $kondisi)
                                                        <li class="mb-1">
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
                                                    <input type="hidden" name="kondisi[{{ $item->kode_gejala }}]"
                                                        id="kondisi_{{ $item->kode_gejala }}{{ $loop->iteration }}"
                                                        value="" />
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="gform_page_footer top_label btn-container d-flex justify-content-end">
                                    <button type="button" id="prev-button" class="btn-prev">Kembali</button>
                                    <button type="button" id="next-button" class="btn-next">Lanjut</button>
                                    <button type="submit" id="submit-button" class="btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('external_js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
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
@endsection
