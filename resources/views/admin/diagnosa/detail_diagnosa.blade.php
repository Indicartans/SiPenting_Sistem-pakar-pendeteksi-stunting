@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="justify-content-center mx-auto">
                            @if (session()->has('pesan'))
                                {!! session('pesan') !!}
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger mt-3 p-3">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                        <h5 class="card-title">Detail <span>| Diagnosa</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Diagnosa</th>
                                                    <th scope="col">Nama Penyakit</th>
                                                    <th scope="col">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $diagnosa->created_at->format('d M Y') }}</td>
                                                    <td>{{ $diagnosa_dipilih['kode_depresi']->depresi }}</td>
                                                    <td>{{ number_format($diagnosa_dipilih['value'] * 100, 2) }}%</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <h5 class="card-title">Gejala <span>| Diagnosa</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th scope="col">Gejala</th>
                                                    <th scope="col">CF Pasien</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gejala as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td class="gejala">{{ $item[0] }}</td>
                                                        <td>{{ $item[1] }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->
@endsection
