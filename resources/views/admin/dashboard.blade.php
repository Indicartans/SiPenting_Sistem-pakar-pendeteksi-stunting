@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Daftar <span>| Gejala</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-activity"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $gejala->count() }}</h6>
                                            <span class="text-success small pt-1 fw-bold">{{ $gejala->count() }}</span>
                                            <span class="text-muted small pt-2 ps-1">gejala</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-4">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                    <h5 class="card-title">Gangguan <span>| Stunting</span></h5>
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-x"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $tingkat_depresi->count() }}</h6>
                                            <span
                                                class="text-success small pt-1 fw-bold">{{ $tingkat_depresi->count() }}</span>
                                            <span class="text-muted small pt-2 ps-1">gejala</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-xl-4">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah <span>| Admin</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $user->count() }}</h6>
                                            <span class="text-danger small pt-1 fw-bold">{{ $user->count() }}</span> <span
                                                class="text-muted small pt-2 ps-1">admin</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Diagnosa <span>| Chart</span></h5>

                                    <canvas id="penyakitChart"></canvas>
                                </div>
                            </div>
                        </div><!-- End Customers Card -->

                        <!-- Recent Sales -->


                    </div>
                </div><!-- End Left side columns -->



            </div>
        </section>

    </main><!-- End #main -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dataChart = @json($data_chart);

            const labels = Object.keys(dataChart);
            const data = Object.values(dataChart);

            const backgroundColors = labels.map((label, index) => {
                const colors = [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ];
                return colors[index % colors.length];
            });

            const borderColors = labels.map((label, index) => {
                const colors = [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ];
                return colors[index % colors.length];
            });

            const ctx = document.getElementById('diagnosaChart').getContext('2d');
            const diagnosaChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Diagnosa Penyakit'
                        }
                    }
                }
            });
        }); --}}
    </script>

@endsection
