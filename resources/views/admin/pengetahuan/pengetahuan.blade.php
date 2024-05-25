@extends('admin.admin_main')
@section('title', 'Gejala')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <div class="container text-center mt-lg-5 p-lg-5">
        <div class="row">
            <div class="col-lg-8 justify-content-center mx-auto">
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
                <div class="mt-2 pt-3 d-flex ms-auto">
                    <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#depresiModal">
                        <i class="bi bi-plus-circle-fill"> Tambah Depresi</i>
                    </button>
                </div>
                <table id="tabel-gejala" class="table table-bordered table-hover my-2">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Penyakit</th>
                            <th scope="col">Gejala</th>
                            <th scope="col">MB</th>
                            <th scope="col">MD</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengetahuan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration + $pengetahuan->firstItem() - 1 }}</th>
                                <td>{{ $item->depresi->depresi }}</td>
                                <td>{{ $item->gejala->gejala }}</td>
                                <td>{{ $item->mb }}</td>
                                <td>{{ $item->md }}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="updateInput('{{ $item->depresi->depresi }}',
                                '{{ $item->gejala->gejala }}', '{{ $item->mb }}', '{{ $item->md }}'), actionUbahdepresi('{{ route('pengetahuan.update', $item->id) }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('pengetahuan.destroy', $item) }}" class="d-inline"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf()
                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $pengetahuan->links('pagination::simple-bootstrap-5') }}
                </div>
                @include('components.admin_modal_pengetahuan_edit')
            </div>
        </div>
    </div>

@endsection
