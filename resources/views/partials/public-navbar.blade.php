<nav class="navbar navbar-expand-lg navbar-light fixed-top public-page-navbar">

    <div class="container">


        {{-- =====================================================
             LOGO / BRAND
        ====================================================== --}}
        <a
            class="navbar-brand public-navbar-brand"
            href="{{ route('landing') }}"
        >

            @if(isset($profil) && $profil && $profil->logo)

                <img
                    src="{{ asset('assets/images/sekolah/' . $profil->logo) }}"
                    alt="{{ $profil->nama_sekolah ?? 'Logo Sekolah' }}"
                    class="public-navbar-logo"
                >

            @else

                <div class="public-navbar-logo-placeholder">
                    <i class="bi bi-building"></i>
                </div>

            @endif


            <div class="public-navbar-brand-text">

                <strong>
                    {{ $profil->nama_sekolah ?? 'Sistem Informasi Sekolah' }}
                </strong>

                <span>
                    Portal Informasi Sekolah
                </span>

            </div>

        </a>


        {{-- =====================================================
             MOBILE TOGGLE
        ====================================================== --}}
        <button
            class="navbar-toggler public-navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNav"
            aria-controls="mainNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >

            <span class="navbar-toggler-icon"></span>

        </button>


        {{-- =====================================================
             NAVIGATION
        ====================================================== --}}
        <div
            class="collapse navbar-collapse"
            id="mainNav"
        >

            <ul class="navbar-nav ms-auto align-items-lg-center">


                {{-- =================================================
                     BERANDA
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('landing') }}"
                        class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}"
                    >
                        Beranda
                    </a>

                </li>


                {{-- =================================================
                     PROFIL
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('profil.landing') }}"
                        class="nav-link {{ request()->routeIs('profil.landing', 'profil.detail') ? 'active' : '' }}"
                    >
                        Profil
                    </a>

                </li>


                {{-- =================================================
                     KEGIATAN SEKOLAH
                ================================================== --}}
                <li class="nav-item dropdown">

                    <a
                        href="#"
                        class="nav-link dropdown-toggle
                            {{ request()->routeIs(
                                'prestasi.landing',
                                'prestasi.detail',
                                'ekstrakulikuler.landing',
                                'ekstrakulikuler.detail'
                            ) ? 'active' : '' }}"
                        id="kegiatanDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        Kegiatan Sekolah

                    </a>


                    {{-- DROPDOWN MENU --}}
                    <ul
                        class="dropdown-menu public-navbar-dropdown"
                        aria-labelledby="kegiatanDropdown"
                    >

                        {{-- PRESTASI --}}
                        <li>

                            <a
                                href="{{ route('prestasi.landing') }}"
                                class="dropdown-item
                                    {{ request()->routeIs(
                                        'prestasi.landing',
                                        'prestasi.detail'
                                    ) ? 'active' : '' }}"
                            >

                                <span class="public-dropdown-icon">
                                    <i class="bi bi-trophy-fill"></i>
                                </span>

                                <span class="public-dropdown-content">

                                    <strong>
                                        Prestasi
                                    </strong>

                                    <small>
                                        Pencapaian siswa & sekolah
                                    </small>

                                </span>

                            </a>

                        </li>


                        {{-- EKSTRAKULIKULER --}}
                        <li>

                            <a
                                href="{{ route('ekstrakulikuler.landing') }}"
                                class="dropdown-item
                                    {{ request()->routeIs(
                                        'ekstrakulikuler.landing',
                                        'ekstrakulikuler.detail'
                                    ) ? 'active' : '' }}"
                            >

                                <span class="public-dropdown-icon">
                                    <i class="bi bi-stars"></i>
                                </span>

                                <span class="public-dropdown-content">

                                    <strong>
                                        Ekstrakulikuler
                                    </strong>

                                    <small>
                                        Kegiatan & minat siswa
                                    </small>

                                </span>

                            </a>

                        </li>

                    </ul>

                </li>


                {{-- =================================================
                     GURU
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('guru.landing') }}"
                        class="nav-link {{ request()->routeIs('guru.landing', 'guru.detail') ? 'active' : '' }}"
                    >
                        Guru
                    </a>

                </li>


                {{-- =================================================
                     GALERI
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('galeri.landing') }}"
                        class="nav-link {{ request()->routeIs('galeri.landing', 'galeri.detail') ? 'active' : '' }}"
                    >
                        Galeri
                    </a>

                </li>


                {{-- =================================================
                     BERITA
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('berita.landing') }}"
                        class="nav-link {{ request()->routeIs('berita.landing', 'berita.detail') ? 'active' : '' }}"
                    >
                        Berita
                    </a>

                </li>

                 {{-- =================================================
                     siswa
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('siswa.landing') }}"
                        class="nav-link {{ request()->routeIs('siswa.landing', 'siswa.detail') ? 'active' : '' }}"
                    >
                        Siswa
                    </a>

                </li>

                {{-- =================================================
                     data diri
                ================================================== --}}
                <li class="nav-item">

                    <a
                        href="{{ route('data.landing') }}"
                        class="nav-link {{ request()->routeIs('data.landing', 'data.detail') ? 'active' : '' }}"
                    >
                        data diri
                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>
