<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar active">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? '' : 'collapsed' }} {{ request()->is('dashboard') ? 'active' : '' }}"
                href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @can('pakar')
            <li class="nav-heading">Pengetahuan</li>

            {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('cl.form') ? '' : 'collapsed' }} {{ request()->routeIs('cl.form') ? 'active' : '' }}"
                href="{{ route('cl.form') }}">
                <i class="bi bi-clipboard-check"></i>
                <span>Diagnosa</span>
            </a>
        </li><!-- End Gejala Page Nav --> --}}

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('gejala.index') ? '' : 'collapsed' }} {{ request()->routeIs('gejala.index') ? 'active' : '' }}"
                    href="{{ route('gejala.index') }}">
                    <i class="bi bi-activity"></i>
                    <span>Gejala</span>
                </a>
            </li><!-- End Gejala Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('depresi.index') ? '' : 'collapsed' }} {{ request()->routeIs('depresi.index') ? 'active' : '' }}"
                    href="{{ route('depresi.index') }}">
                    <i class="bi bi-patch-question"></i>
                    <span>Penyakit</span>
                </a>
            </li><!-- End Depresi Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('spk.index') ? '' : 'collapsed' }} {{ request()->routeIs('spk.index') ? 'active' : '' }}"
                    href="{{ route('spk.index') }}">
                    <i class="bi bi-clipboard2-data"></i>
                    <span>Hasil Diagnosa</span>
                </a>
            </li><!-- End Depresi Page Nav -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('pengetahuan') ? '' : 'collapsed' }} {{ request()->is('pengetahuan') ? 'active' : '' }}"
                    href="/pengetahuan">
                    <i class="bi bi-graph-up"></i>
                    <span>Basis Pengetahuan</span>
                </a>
            </li><!-- End Depresi Page Nav -->

            <li class="nav-item">
                <a class="nav-link {{ request()->is('keterangan') ? '' : 'collapsed' }} {{ request()->is('keterangan') ? 'active' : '' }}"
                    href="/keterangan">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Artikel</span>
                </a>
            </li><!-- End Depresi Page Nav -->
        @endcan

        @can('kelurahan')
            <li class="nav-heading">Laporan</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('kesehatan') ? '' : 'collapsed' }} {{ request()->is('kesehatan') ? 'active' : '' }}"
                    href="/kesehatan">
                    <i class="bi bi-filetype-pdf"></i>
                    <span>Data Kesehatan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('laporan') ? '' : 'collapsed' }} {{ request()->is('laporan') ? 'active' : '' }}"
                    href="/laporan">
                    <i class="bi bi-broadcast-pin"></i>
                    <span>Laporan PSN</span>
                </a>
            </li>
        @endcan

        <li class="nav-heading">Pengaturan</li>
        @can('pakar')
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('dashboard/add_admin') || request()->is('dashboard/admin') ? 'active' : '' }}"
                    data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav"
                    class="nav-content collapse {{ request()->is('dashboard/add_admin') || request()->is('dashboard/admin') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ request()->is('/admin/create') ? 'active' : '' }}" href="/admin/create">
                            <i class="bi bi-circle"></i><span>Tambah Admin</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('/admin') ? 'active' : '' }}" href="/admin">
                            <i class="bi bi-circle"></i><span>Daftar Admin</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Forms Nav -->
        @endcan


        <li class="nav-item" style="nowrap">
            <a class="nav-link collapsed" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li><!-- End F.A.Q Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
