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
                @can('pakar')
                    <div class="col-lg-12">
                        <div class="row">
                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Daftar <span>| Gejala</span></h5>
                                        {{-- <h5 class="card-title">{{ $test }}</h5> --}}

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
                        @endcan

                        @can('kelurahan')
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Penyakit Tiap Bulan</h5>
                                        <!-- Bar Chart -->
                                        <canvas id="barChart" style="max-height: 400px;"></canvas>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                fetch('/chart')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const barData = data.barData;

                                                        // Menyiapkan data untuk Bar Chart
                                                        const barLabels = [...new Set(barData.map(item => item.bulan))];
                                                        const barDatasets = {};

                                                        barData.forEach(item => {
                                                            if (!barDatasets[item.penyakit]) {
                                                                barDatasets[item.penyakit] = Array(barLabels.length).fill(0);
                                                            }
                                                            const index = barLabels.indexOf(item.bulan);
                                                            barDatasets[item.penyakit][index] = item.jumlah;
                                                        });

                                                        const barChartData = {
                                                            labels: barLabels,
                                                            datasets: Object.keys(barDatasets).map(penyakit => ({
                                                                label: penyakit,
                                                                data: barDatasets[penyakit],
                                                                backgroundColor: getRandomColor(),
                                                                borderColor: getRandomColor(),
                                                                borderWidth: 1
                                                            })),
                                                        };

                                                        // Membuat Bar Chart
                                                        const ctxBar = document.getElementById('barChart').getContext('2d');
                                                        new Chart(ctxBar, {
                                                            type: 'bar',
                                                            data: barChartData,
                                                            options: {
                                                                scales: {
                                                                    y: {
                                                                        beginAtZero: true
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    });
                                            });

                                            // Fungsi untuk menghasilkan warna acak
                                            function getRandomColor() {
                                                const letters = '0123456789ABCDEF';
                                                let color = '#';
                                                for (let i = 0; i < 6; i++) {
                                                    color += letters[Math.floor(Math.random() * 16)];
                                                }
                                                return color;
                                            }
                                        </script>
                                        <!-- End Bar Chart -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Penyakit Berdasarkan Usia</h5>
                                        <!-- Bar Chart -->
                                        <canvas id="usiaChart" style="max-height: 400px;"></canvas>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                fetch('/chart')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const usiaData = data.usiaData;

                                                        // Menyiapkan data untuk Bar Chart berdasarkan usia
                                                        const usiaLabels = [...new Set(usiaData.map(item => item.penyakit))];
                                                        const usiaCategories = [...new Set(usiaData.map(item => item.usia_kategori))];
                                                        const usiaDatasets = usiaCategories.map(category => {
                                                            return {
                                                                label: category,
                                                                data: usiaLabels.map(label => {
                                                                    const item = usiaData.find(d => d.penyakit === label && d
                                                                        .usia_kategori === category);
                                                                    return item ? item.jumlah : 0;
                                                                }),
                                                                // backgroundColor: category === 'Usia < 2' ? 'rgba(75, 192, 192, 0.2)' :
                                                                //     'rgba(153, 102, 255, 0.2)',
                                                                // borderColor: category === 'Usia < 2' ? 'rgba(75, 192, 192, 1)' :
                                                                //     'rgba(153, 102, 255, 1)',
                                                                backgroundColor: category === 'Usia < 2' ? getRandomColor() :
                                                                    getRandomColor(),
                                                                borderColor: 'Usia < 2 ' ? getRandomColor() : getRandomColor(),
                                                                borderWidth: 1
                                                            };
                                                        });

                                                        const ctxUsia = document.getElementById('usiaChart').getContext('2d');
                                                        new Chart(ctxUsia, {
                                                            type: 'bar',
                                                            data: {
                                                                labels: usiaLabels,
                                                                datasets: usiaDatasets
                                                            },
                                                            options: {
                                                                scales: {
                                                                    y: {
                                                                        beginAtZero: true
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    });
                                            });

                                            function getRandomColor() {
                                                const letters = '0123456789ABCDEF';
                                                let color = '#';
                                                for (let i = 0; i < 6; i++) {
                                                    color += letters[Math.floor(Math.random() * 16)];
                                                }
                                                return color;
                                            }
                                        </script>
                                        <!-- End Bar Chart -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Penderita Tiap Penyakit</h5>
                                        <!-- Doughnut Chart -->
                                        <canvas id="doughnutChart" style="max-height: 400px;"></canvas>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                fetch('/chart')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        const doughnutData = data.doughnutData;

                                                        // Menyiapkan data untuk Doughnut Chart
                                                        const doughnutLabels = doughnutData.map(item => item.penyakit);
                                                        const doughnutValues = doughnutData.map(item => item.jumlah);
                                                        const doughnutColors = doughnutLabels.map(() => getRandomColor());

                                                        const doughnutChartData = {
                                                            labels: doughnutLabels,
                                                            datasets: [{
                                                                data: doughnutValues,
                                                                backgroundColor: doughnutColors,
                                                                hoverOffset: 4
                                                            }]
                                                        };

                                                        // Membuat Doughnut Chart
                                                        const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
                                                        new Chart(ctxDoughnut, {
                                                            type: 'doughnut',
                                                            data: doughnutChartData,
                                                        });
                                                    });
                                            });

                                            // Fungsi untuk menghasilkan warna acak
                                            function getRandomColor() {
                                                const letters = '0123456789ABCDEF';
                                                let color = '#';
                                                for (let i = 0; i < 6; i++) {
                                                    color += letters[Math.floor(Math.random() * 16)];
                                                }
                                                return color;
                                            }
                                        </script>
                                        <!-- End Doughnut Chart -->
                                    </div>
                                </div>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->


@endsection

<script></script>
