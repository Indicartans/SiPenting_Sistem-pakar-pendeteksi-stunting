@extends('admin.admin_main')
@section('title', 'Dashboard')

@section('external_assets')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.dataTables.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endsection
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
                                        <h5 class="card-title">Data <span>| Kesehatan</span></h5>
                                        <div class="mb-3 d-flex justify-content-end">
                                            <a href="{{ route('download.pdf') }}">
                                                <button class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#storeModal">
                                                    <i class="bi bi-filetype-pdf"> Export PDF</i>
                                                </button>
                                            </a>

                                        </div>
                                        <table class="table table-borderless datatable" id="tabel_kesehatan">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Orangtua</th>
                                                    <th scope="col">Nama Anak</th>
                                                    <th scope="col">Usia</th>
                                                    <th scope="col">Penyakit</th>
                                                    <th scope="col">Presentase</th>
                                                    <th scope="col">Kontak</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <th scope="row"><a href="#">
                                                                {{ $loop->iteration }}</a>
                                                        </th>
                                                        <td>{{ $item->nama_orangtua }}</td>
                                                        <td>{{ $item->nama_anak }}</td>
                                                        <td>{{ $item->usia }} tahun</td>
                                                        <td>{{ $item->penyakit }}</td>
                                                        <td>{{ $item->presentase }}%</td>
                                                        <td>{{ $item->kontak }}</td>
                                                        <td>{{ $item->alamat }}</td>
                                                        <td>{{ $item->created_at->format('d M Y') }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $gejala->links('pagination::simple-bootstrap-5') }} --}}
                            </div>
                            {{-- @include('components.admin_modal_gejala_edit') --}}
                        </div>

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->


@endsection

@section('external_js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabel_kesehatan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('kesehatan.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_orangtua',
                        name: 'nama_orangtua'
                    },
                    {
                        data: 'nama_anak',
                        name: 'nama_anak'
                    },
                    {
                        data: 'usia',
                        name: 'usia'
                    },
                    {
                        data: 'penyakit',
                        name: 'penyakit'
                    },
                    {
                        data: 'presentase',
                        name: 'presentase'
                    },
                    {
                        data: 'kontak',
                        name: 'kontak'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            });
        });
    </script>
@endsection
