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
                                        <h5 class="card-title">Hasil <span>| Diagnosa</span></h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Diagnosa Id</th>
                                                    <th scope="col">Nama Penyakit</th>
                                                    <th scope="col">Persentase</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($diagnosa as $item)
                                                    <?php $int = 0; ?>
                                                    <?php $data_diagnosa = json_decode($item->data_diagnosa, true); ?>
                                                    <?php foreach ($data_diagnosa as $val) {
                                                        if (floatval($val['value']) > $int) {
                                                            $diagnosa_dipilih['value'] = floatval($val['value']);
                                                            $diagnosa_dipilih['kode_depresi'] = App\Models\TingkatDepresi::where('kode_depresi', $val['kode_depresi'])->first();
                                                            $int = floatval($val['value']);
                                                        }
                                                    } ?>
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $item->diagnosa_id }}</td>
                                                        <td> {{ $diagnosa_dipilih['kode_depresi']->kode_depresi }} |
                                                            {{ $diagnosa_dipilih['kode_depresi']->depresi }}</td>
                                                        <td>{{ $diagnosa_dipilih['value'] * 100 }} %</td>
                                                        <td><a class="p-2"
                                                                href="{{ route('spk.result', ['diagnosa_id' => $item->diagnosa_id]) }}">Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                            {{-- <div class="d-flex justify-content-center">
                                {{ $depresi->links('pagination::simple-bootstrap-5') }}
                            </div> --}}
                            @include('components.admin_modal_depresi_edit')
                        </div>

                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>

    </main><!-- End #main -->


@endsection
