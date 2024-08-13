@extends('admin.admin_main')
@section('title', 'Dashboard')

@section('external_assets')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endsection

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
                                        <h5 class="card-title">Data <span>| Kesehatan</span></h5>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <form action="{{ route('kesehatan.index') }}" method="GET"
                                                class="d-flex align-items-center">
                                                <select name="usia" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected disabled>Filter Berdasarkan Usia</option>
                                                    <option value="">Tampilkan semua</option>
                                                    <option value="1">1 Tahun</option>
                                                    <option value="2">2 Tahun</option>
                                                    <option value="3">3 Tahun</option>
                                                    <option value="4">4 Tahun</option>
                                                    <option value="5">5 Tahun</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary ms-1"><i
                                                        class="bi bi-filter"></i></button>
                                            </form>
                                            <a href="{{ route('download.pdf') }}">
                                                <button class="btn btn-danger ms-3">
                                                    <i class="bi bi-filetype-pdf"></i> Export PDF
                                                </button>
                                            </a>
                                        </div>

                                        <table class="table table-borderless datatable" id="tabel_kesehatan">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Nama Pelapor</th>
                                                    <th scope="col">Nama Kepala Rumah Tangga</th>
                                                    <th scope="col">RT</th>
                                                    <th scope="col">RW</th>
                                                    <th scope="col">Jentik Nyamuk</th>
                                                    <th scope="col">Indikasi Penyakit</th>
                                                    <th scope="col">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <th> {{ $loop->iteration }}</th>
                                                        <th> {{ $item->created_at->format('d M Y') }}</th>
                                                        <th> {{ $item->pelapor }}</th>
                                                        <th> {{ $item->nama }}</th>
                                                        <th> {{ $item->rt }}</th>
                                                        <th> {{ $item->rw }}</th>
                                                        <th> {{ $item->jentik_nyamuk }}</th>
                                                        <th> {{ $item->penyakit ?: '-' }}</th>
                                                        <th> {{ $item->jumlah ?: '-' }}</th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $data->links('pagination::simple-bootstrap-5') }} --}}
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection
