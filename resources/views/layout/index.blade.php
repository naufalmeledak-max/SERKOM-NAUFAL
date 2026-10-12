<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Sistem Informasi Sekolah')</title>


    {{-- ================= PLUGINS CSS ================= --}}

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">


    {{-- ================= CORONA CSS ================= --}}

    <link rel="stylesheet"
          href="{{ asset('assets/css/style.css') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/admin.css') }}">


    {{-- ================= FAVICON ================= --}}

    <link rel="shortcut icon"
          href="{{ asset('assets/images/favicon.png') }}">

    <link rel="stylesheet"
          href="{{ asset('assets/css/data-admin.css') }}">

</head>


<body>

<div class="container-scroller">


    {{-- =====================================================
       SIDEBAR
    ===================================================== --}}

    <nav class="sidebar sidebar-offcanvas"
         id="sidebar">


        {{-- ================= LOGO SIDEBAR ================= --}}

        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">


            {{-- LOGO BESAR: ADMIN --}}

            <a class="sidebar-brand brand-logo"
               href="{{ url('/') }}">

                <span class="admin-logo">
                    ADMIN
                </span>

            </a>


            {{-- LOGO KECIL: A --}}

            <a class="sidebar-brand brand-logo-mini"
               href="{{ url('/') }}">

                <span class="admin-logo">
                    A
                </span>

            </a>

        </div>


        <ul class="nav">


            {{-- =================================================
               PROFILE SIDEBAR
            ================================================= --}}

            <li class="nav-item profile">

                <div class="profile-desc">

                    <div class="profile-pic">

                        <div class="count-indicator">

                            <img class="img-xs rounded-circle"
                                 src="{{ asset('assets/images/faces/face15.jpg') }}"
                                 alt="profile">

                            <span class="count bg-success"></span>

                        </div>


                        <div class="profile-name">

                            <h5 class="mb-0 font-weight-normal">
                                {{ Auth::user()->name }}
                            </h5>

                            <span>
                                {{ Auth::user()->role }}
                            </span>

                        </div>

                    </div>


                    <a href="#"
                       id="profile-dropdown"
                       data-toggle="dropdown">

                        <i class="mdi mdi-dots-vertical"></i>

                    </a>


                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                         aria-labelledby="profile-dropdown">


                        {{-- ACCOUNT SETTINGS --}}

                        <a href="#"
                           class="dropdown-item preview-item">

                            <div class="preview-thumbnail">

                                <div class="preview-icon bg-dark rounded-circle">

                                    <i class="mdi mdi-settings text-primary"></i>

                                </div>

                            </div>

                            <div class="preview-item-content">

                                <p class="preview-subject ellipsis mb-1 text-small">
                                    Account settings
                                </p>

                            </div>

                        </a>


                        <div class="dropdown-divider"></div>


                        {{-- CHANGE PASSWORD --}}

                        <a href="#"
                           class="dropdown-item preview-item">

                            <div class="preview-thumbnail">

                                <div class="preview-icon bg-dark rounded-circle">

                                    <i class="mdi mdi-onepassword text-info"></i>

                                </div>

                            </div>

                            <div class="preview-item-content">

                                <p class="preview-subject ellipsis mb-1 text-small">
                                    Change Password
                                </p>

                            </div>

                        </a>

                    </div>

                </div>

            </li>


            {{-- =================================================
               NAVIGATION
            ================================================= --}}

            <li class="nav-item nav-category">

                <span class="nav-link">
                    Navigation
                </span>

            </li>


            {{-- =================================================
               DASHBOARD
            ================================================= --}}

            <li class="nav-item menu-items">

                <a class="nav-link"
                   href="{{ url('/dashboard') }}">

                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>

                    <span class="menu-title">
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- =================================================
               USER
               ADMIN SAJA
            ================================================= --}}

            @if(Auth::user()->role == 'Admin')

                <li class="nav-item menu-items">

                    <a class="nav-link"
                       href="{{ route('user.index') }}">

                        <span class="menu-icon">

                            <i class="mdi mdi-account"></i>

                        </span>

                        <span class="menu-title">
                            User
                        </span>

                    </a>

                </li>

            @endif


            {{-- =================================================
               DATA SEKOLAH
            ================================================= --}}

            <li class="nav-item menu-items">

                <a class="nav-link"
                   data-toggle="collapse"
                   href="#dataSekolah"
                   aria-expanded="false"
                   aria-controls="dataSekolah">

                    <span class="menu-icon">

                        <i class="mdi mdi-school"></i>

                    </span>

                    <span class="menu-title">
                        Data Sekolah
                    </span>

                    <i class="menu-arrow"></i>

                </a>


                <div class="collapse"
                     id="dataSekolah">

                    <ul class="nav flex-column sub-menu">


                        {{-- PROFIL SEKOLAH --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('profil-sekolah.index') }}">

                                Profil Sekolah

                            </a>

                        </li>


                        {{-- GURU --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('guru.index') }}">

                                Guru

                            </a>

                        </li>


                        {{-- SISWA --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('siswa.index') }}">

                                Siswa

                            </a>

                        </li>


                        {{-- DATA DIRI --}}

                        <li class="nav-item">

                            <a class="nav-link"
                            href="{{ route('data-admin.index') }}">

                                <i class="mdi mdi-card-account-details-outline mr-2"></i>

                                Data Diri

                            </a>

                        </li>



                    </ul>

                </div>

            </li>


            {{-- =================================================
               KEGIATAN SEKOLAH
            ================================================= --}}

            <li class="nav-item menu-items">

                <a class="nav-link"
                   data-toggle="collapse"
                   href="#kegiatanSekolah"
                   aria-expanded="false"
                   aria-controls="kegiatanSekolah">

                    <span class="menu-icon">

                        <i class="mdi mdi-trophy"></i>

                    </span>

                    <span class="menu-title">
                        Kegiatan Sekolah
                    </span>

                    <i class="menu-arrow"></i>

                </a>


                <div class="collapse"
                     id="kegiatanSekolah">

                    <ul class="nav flex-column sub-menu">


                        {{-- EKSTRAKURIKULER --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('ekstrakulikuler.index') }}">

                                Ekstrakurikuler

                            </a>

                        </li>


                        {{-- PRESTASI --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('prestasi.index') }}">

                                Prestasi

                            </a>

                        </li>


                    </ul>

                </div>

            </li>


            {{-- =================================================
               PUBLIKASI
            ================================================= --}}

            <li class="nav-item menu-items">

                <a class="nav-link"
                   data-toggle="collapse"
                   href="#publikasi"
                   aria-expanded="false"
                   aria-controls="publikasi">

                    <span class="menu-icon">

                        <i class="mdi mdi-newspaper"></i>

                    </span>

                    <span class="menu-title">
                        Publikasi
                    </span>

                    <i class="menu-arrow"></i>

                </a>


                <div class="collapse"
                     id="publikasi">

                    <ul class="nav flex-column sub-menu">


                        {{-- GALERI --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('galeri.index') }}">

                                Galeri

                            </a>

                        </li>


                        {{-- BERITA --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('berita.index') }}">

                                Berita

                            </a>

                        </li>


                        {{-- PENGUMUMAN --}}

                        <li class="nav-item">

                            <a class="nav-link"
                               href="{{ route('pengumuman.index') }}">

                                Pengumuman

                            </a>

                        </li>


                    </ul>

                </div>

            </li>


        </ul>

    </nav>


    {{-- =====================================================
       SIDEBAR SELESAI
    ===================================================== --}}


    <div class="container-fluid page-body-wrapper">


        {{-- =================================================
           NAVBAR
        ================================================= --}}

        <nav class="navbar p-0 fixed-top d-flex flex-row">


            {{-- =================================================
               MOBILE LOGO
               HANYA A
            ================================================= --}}

            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">

                <a class="navbar-brand brand-logo-mini"
                   href="{{ url('/') }}">

                    <span class="admin-logo">
                        A
                    </span>

                </a>

            </div>


            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">


                {{-- =================================================
                   SIDEBAR BUTTON
                ================================================= --}}

                <button class="navbar-toggler navbar-toggler align-self-center"
                        type="button"
                        data-toggle="minimize">

                    <span class="mdi mdi-menu"></span>

                </button>


                {{-- =================================================
                   NAVBAR KANAN
                ================================================= --}}

                <ul class="navbar-nav navbar-nav-right ml-auto">


                    {{-- =================================================
                       THEME TOGGLE
                    ================================================= --}}

                    <li class="nav-item nav-settings d-none d-lg-block">

                        <button type="button"
                                class="nav-link theme-toggle"
                                id="themeToggle"
                                title="Ganti Tema">

                            <i class="mdi mdi-white-balance-sunny"
                               id="themeIcon">
                            </i>

                        </button>

                    </li>


                    {{-- =================================================
                       PROFILE
                    ================================================= --}}

                    <li class="nav-item dropdown">


                        <a class="nav-link"
                           id="profileDropdown"
                           href="#"
                           data-toggle="dropdown">


                            <div class="navbar-profile">


                                <img class="img-xs rounded-circle"
                                     src="{{ asset('assets/images/faces/face15.jpg') }}"
                                     alt="profile">


                                <p class="mb-0 d-none d-sm-block navbar-profile-name">

                                    {{ Auth::user()->name }}

                                </p>


                                <i class="mdi mdi-menu-down d-none d-sm-block"></i>


                            </div>


                        </a>


                        {{-- =================================================
                           PROFILE DROPDOWN
                        ================================================= --}}

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                             aria-labelledby="profileDropdown">


                            <h6 class="p-3 mb-0">
                                Profile
                            </h6>


                            <div class="dropdown-divider"></div>


                            {{-- SETTINGS --}}

                            <a class="dropdown-item preview-item"
                               href="#">

                                <div class="preview-thumbnail">

                                    <div class="preview-icon bg-dark rounded-circle">

                                        <i class="mdi mdi-settings text-success"></i>

                                    </div>

                                </div>


                                <div class="preview-item-content">

                                    <p class="preview-subject mb-1">
                                        Settings
                                    </p>

                                </div>

                            </a>


                            <div class="dropdown-divider"></div>


                            {{-- =================================================
                               LOGOUT
                            ================================================= --}}

                            <form action="{{ route('logout') }}"
                                  method="POST">

                                @csrf

                                <button type="submit"
                                        class="dropdown-item preview-item logout-button">


                                    <div class="preview-thumbnail">

                                        <div class="preview-icon bg-dark rounded-circle">

                                            <i class="mdi mdi-logout text-danger"></i>

                                        </div>

                                    </div>


                                    <div class="preview-item-content">

                                        <p class="preview-subject mb-1">
                                            Logout
                                        </p>

                                    </div>


                                </button>

                            </form>


                        </div>

                    </li>


                </ul>


                {{-- =================================================
                   MOBILE MENU
                ================================================= --}}

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                        type="button"
                        data-toggle="offcanvas">

                    <span class="mdi mdi-format-line-spacing"></span>

                </button>


            </div>

        </nav>


        {{-- =====================================================
           NAVBAR SELESAI
        ===================================================== --}}


        {{-- =====================================================
           MAIN PANEL
        ===================================================== --}}

        <div class="main-panel">

            <div class="content-wrapper">

                @yield('content')

            </div>


            {{-- =================================================
               FOOTER
            ================================================= --}}

            <footer class="footer">

                <div class="d-sm-flex justify-content-center justify-content-sm-between">


                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">

                        Copyright © 2026

                    </span>


                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">

                        Sistem Informasi Profil Sekolah

                    </span>


                </div>

            </footer>


        </div>


    </div>

</div>


{{-- =====================================================
   JAVASCRIPT
===================================================== --}}

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>

<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>

<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>


<script src="{{ asset('assets/js/off-canvas.js') }}"></script>

<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>

<script src="{{ asset('assets/js/misc.js') }}"></script>

<script src="{{ asset('assets/js/settings.js') }}"></script>

<script src="{{ asset('assets/js/todolist.js') }}"></script>

<script src="{{ asset('assets/js/dashboard.js') }}"></script>


{{-- =====================================================
   THEME SCRIPT
===================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');

    const savedTheme = localStorage.getItem('theme');


    /* =====================================================
       CEK ELEMEN
    ===================================================== */

    if (!themeToggle || !themeIcon) {
        return;
    }


    /* =====================================================
       TEMA AWAL
    ===================================================== */

    if (savedTheme === 'light') {

        document.body.classList.add('light-theme');

        themeIcon.classList.remove('mdi-white-balance-sunny');

        themeIcon.classList.add('mdi-weather-night');

    }


    /* =====================================================
       GANTI TEMA
    ===================================================== */

    themeToggle.addEventListener('click', function () {

        document.body.classList.toggle('light-theme');


        if (document.body.classList.contains('light-theme')) {

            localStorage.setItem('theme', 'light');

            themeIcon.classList.remove('mdi-white-balance-sunny');

            themeIcon.classList.add('mdi-weather-night');

        } else {

            localStorage.setItem('theme', 'dark');

            themeIcon.classList.remove('mdi-weather-night');

            themeIcon.classList.add('mdi-white-balance-sunny');

        }

    });

});

</script>


@stack('scripts')

</body>

</html>
