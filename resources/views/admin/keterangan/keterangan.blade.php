@extends('admin.admin_main')
@section('title', 'Keterangan')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    {{-- <div class="container text-center "> --}}
    <div class="row text-center">
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
                <button class="btn btn-outline-success mb-4" data-bs-toggle="modal" data-bs-target="#depresiModal">
                    <i class="bi bi-plus-circle-fill"> Tambah Artikel</i>
                </button>
            </div>

            <div class="table-responsive m-2">
                <table id="tabel-gejala" class="table table-bordered table-hover my-2">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Penyakit</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Detail Penyakit</th>
                            <th scope="col">Saran</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keterangan as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->judul }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->url_gambar) }}" alt="gambar penyakit"
                                        class="img-fluid">
                                </td>
                                <td>{{ $item->isi }}</td>
                                <td>{{ $item->saran }}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#editModal"
                                        onclick="updateInput('{{ $item->judul }}', '{{ $item->isi }}','{{ $item->saran }}', '{{ $item->url_gambar }}', '{{ route('keterangan.update', $item->id) }}')">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <form action="{{ route('keterangan.destroy', $item) }}" class="d-inline"
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
            </div>


            @include('components.admin_modal_keterangan_edit')
        </div>
    </div>
    {{-- </div> --}}

@endsection
