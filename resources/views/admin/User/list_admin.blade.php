@extends('admin.admin_main')
@section('title', 'Daftar Admin')

@section('external_assets')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Admin</a></li>
                    <li class="breadcrumb-item active">Daftar Admin</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <style>
                    .card-deck {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 20px;
                    }

                    .card {
                        flex: 1 1 calc(33.333% - 20px);
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        border-radius: 10px;
                        overflow: hidden;
                        transition: transform 0.2s;
                    }

                    .card:hover {
                        transform: translateY(-10px);
                    }

                    .card i {
                        font-size: 48px;
                        color: #333;
                        margin-top: 20px;
                    }

                    .card-body {
                        padding: 20px;
                        text-align: center;
                    }

                    .card-title {
                        font-size: 18px;
                        font-weight: bold;
                        margin-bottom: 10px;
                    }

                    .card-text {
                        font-size: 14px;
                        color: #666;
                    }
                </style>
                @if (session()->has('pesan'))
                    <div class="alert alert-success">{{ session('pesan') }}</div>
                @endif
                <div class="card-deck">
                    @foreach ($user as $u)
                        <div class="card">
                            <div class="card-body">
                                <i class="bi bi-person-fill"></i>
                                <h5 class="card-title">Nama : {{ $u->name }}</h5>
                                <p class="card-text">Email : {{ $u->email }}</p>
                                <p class="card-text">Role : {{ $u->role }}</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button class="btn btn-warning" data-bs-target="#editModal" data-bs-toggle="modal"
                                        onclick="update('{{ $u->id }}', '{{ $u->name }}', '{{ $u->email }}', '{{ $u->role }}')">
                                        <i class="bi bi-pencil-fill fs-6 text-light"></i>
                                    </button>
                                    <form action="/admin/{{ $u->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash3-fill text-light fs-6"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @include('admin.User.edit_admin')
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
