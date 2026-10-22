<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profil->nama_sekolah ?? 'Sistem Informasi Sekolah' }}</title>
    <meta name="description" content="Website resmi {{ $profil->nama_sekolah ?? 'sekolah' }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet"
      href="{{ asset('assets/css/public-common.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
      href="{{ asset('assets/vendors/bootstrap5.3.3/css/bootstrap.min.css') }}">

<link rel="stylesheet"
      href="{{ asset('assets/vendors/bootstrap-icons-1.11.3/font/bootstrap-icons.css') }}">

<link rel="stylesheet"
      href="{{ asset('assets/vendors/aos-2.3.4/aos.css') }}">


</head>
<body>

@include('partials.public-navbar')

<main>

<section id="beranda" class="hero-banner">

    {{-- Background Banner --}}
    @if(!empty($profil?->foto))
        <div
            class="hero-banner-bg"
            style="background-image: url('{{ asset('assets/images/sekolah/' . $profil->foto) }}');">
        </div>
    @else
        <div class="hero-banner-bg hero-banner-placeholder"></div>
    @endif

    {{-- Overlay --}}
    <div class="hero-banner-overlay"></div>

    {{-- Isi Banner --}}
    <div class="container position-relative">

        <div class="row align-items-center">
            <div class="col-lg-8 col-xl-7">

                <div class="hero-banner-content" data-aos="fade-up">

                    <span class="hero-kicker">
                        <i class="bi bi-stars"></i>
                        Portal Informasi Sekolah
                    </span>

                    <h1>
                        Selamat Datang di
                        <span>
                            {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                        </span>
                    </h1>

                    <p>
                        {{ \Illuminate\Support\Str::limit(
                            $profil->deskripsi ??
                            'Sajikan informasi sekolah, prestasi, kegiatan, berita, dan pengumuman dalam satu tempat yang mudah diakses.',
                            220
                        ) }}
                    </p>

                    <div class="hero-banner-buttons">

                        <a href="#profil" class="btn btn-primary-custom">
                            Kenal Lebih Dekat
                            <i class="bi bi-arrow-down ms-1"></i>
                        </a>

                        <a
                            href="{{ route('berita.landing') }}"
                            class="btn btn-outline-light-custom"
                        >
                            Lihat Berita
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>

                    {{-- Informasi Singkat --}}
                    <div class="hero-banner-info">

                        <div class="hero-info-item">
                            <i class="bi bi-person-badge"></i>
                            <div>
                                <small>Kepala Sekolah</small>
                                <strong>
                                    {{ $profil->kepala_sekolah ?? '-' }}
                                </strong>
                            </div>
                        </div>

                        <div class="hero-info-item">
                            <i class="bi bi-calendar3"></i>
                            <div>
                                <small>Berdiri Sejak</small>
                                <strong>
                                    {{ $profil->tahun_berdiri ?? '-' }}
                                </strong>
                            </div>
                        </div>

                        <div class="hero-info-item">
                            <i class="bi bi-shield-check"></i>
                            <div>
                                <small>NPSN</small>
                                <strong>
                                    {{ $profil->npsn ?? '-' }}
                                </strong>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        {{-- Scroll Indicator --}}
        <a href="#profil" class="hero-scroll">
            <span>Scroll untuk melihat lebih lanjut</span>
            <i class="bi bi-chevron-down"></i>
        </a>

    </div>

</section>


<section class="landing-statistics-section">

    <div class="container">

        <div class="landing-statistics-wrapper">


            {{-- =================================================
                 GURU
            ================================================== --}}
            <div
                class="landing-stat-card"
                data-aos="fade-up"
            >

                <div class="landing-stat-icon">

                    <i class="bi bi-person-workspace"></i>

                </div>


                <div class="landing-stat-content">

                    <span class="landing-stat-label">
                        Tenaga Pendidik
                    </span>


                    <div class="landing-stat-number-wrapper">

                        <strong
                            class="landing-stat-number"
                            data-target="{{ $jumlahGuru }}"
                        >
                            0
                        </strong>

                        <span class="landing-stat-plus">
                            +
                        </span>

                    </div>


                    <span class="landing-stat-description">
                        Guru
                    </span>

                </div>

            </div>


            {{-- =================================================
                 SISWA
            ================================================== --}}
            <div
                class="landing-stat-card"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div class="landing-stat-icon">

                    <i class="bi bi-people-fill"></i>

                </div>


                <div class="landing-stat-content">

                    <span class="landing-stat-label">
                        Peserta Didik
                    </span>


                    <div class="landing-stat-number-wrapper">

                        <strong
                            class="landing-stat-number"
                            data-target="{{ $jumlahSiswa }}"
                        >
                            0
                        </strong>

                        <span class="landing-stat-plus">
                            +
                        </span>

                    </div>


                    <span class="landing-stat-description">
                        Siswa
                    </span>

                </div>

            </div>


            {{-- =================================================
                 PRESTASI
            ================================================== --}}
            <div
                class="landing-stat-card"
                data-aos="fade-up"
                data-aos-delay="200"
            >

                <div class="landing-stat-icon">

                    <i class="bi bi-trophy-fill"></i>

                </div>


                <div class="landing-stat-content">

                    <span class="landing-stat-label">
                        Pencapaian
                    </span>


                    <div class="landing-stat-number-wrapper">

                        <strong
                            class="landing-stat-number"
                            data-target="{{ $jumlahPrestasi }}"
                        >
                            0
                        </strong>

                        <span class="landing-stat-plus">
                            +
                        </span>

                    </div>


                    <span class="landing-stat-description">
                        Prestasi
                    </span>

                </div>

            </div>


            {{-- =================================================
                 EKSTRAKULIKULER
            ================================================== --}}
            <div
                class="landing-stat-card"
                data-aos="fade-up"
                data-aos-delay="300"
            >

                <div class="landing-stat-icon">

                    <i class="bi bi-stars"></i>

                </div>


                <div class="landing-stat-content">

                    <span class="landing-stat-label">
                        Kegiatan
                    </span>


                    <div class="landing-stat-number-wrapper">

                        <strong
                            class="landing-stat-number"
                            data-target="{{ $jumlahEkstrakulikuler }}"
                        >
                            0
                        </strong>

                        <span class="landing-stat-plus">
                            +
                        </span>

                    </div>


                    <span class="landing-stat-description">
                        Ekstrakulikuler
                    </span>

                </div>

            </div>


        </div>

    </div>

</section>


<section class="landing-services-section">

    <div class="container">


        {{-- =====================================================
             HEADER
        ====================================================== --}}
        <div
            class="section-title text-center landing-services-header"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Layanan Informasi
            </div>

            <h2>
                Semua Informasi Sekolah
                <span>dalam Satu Tempat</span>
            </h2>

            <p>
                Jelajahi berbagai informasi sekolah dengan mudah,
                mulai dari profil, kegiatan, galeri, hingga
                berita terbaru.
            </p>

        </div>


        {{-- =====================================================
             SERVICE CARDS
        ====================================================== --}}
        <div class="row g-4">


            {{-- =================================================
                 01 - PROFIL
            ================================================== --}}
            <div
                class="col-md-6 col-xl-3"
                data-aos="fade-up"
            >

                <article class="landing-service-card">

                    <div class="landing-service-number">
                        01
                    </div>


                    <div class="landing-service-icon">

                        <i class="bi bi-building-fill"></i>

                    </div>


                    <div class="landing-service-content">

                        <span class="landing-service-label">
                            Tentang Sekolah
                        </span>

                        <h3>
                            Profil Sekolah
                        </h3>

                        <p>
                            Kenali identitas, visi dan misi,
                            kepala sekolah, serta informasi
                            penting mengenai sekolah.
                        </p>

                    </div>


                    <a
                        href="{{ route('profil.landing') }}"
                        class="landing-service-link"
                    >

                        Lihat Profil

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </article>

            </div>


            {{-- =================================================
                 02 - KEGIATAN
            ================================================== --}}
            <div
                class="col-md-6 col-xl-3"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <article class="landing-service-card">

                    <div class="landing-service-number">
                        02
                    </div>


                    <div class="landing-service-icon">

                        <i class="bi bi-stars"></i>

                    </div>


                    <div class="landing-service-content">

                        <span class="landing-service-label">
                            Aktivitas Siswa
                        </span>

                        <h3>
                            Kegiatan Sekolah
                        </h3>

                        <p>
                            Temukan berbagai kegiatan siswa,
                            mulai dari ekstrakulikuler hingga
                            pencapaian dan prestasi sekolah.
                        </p>

                    </div>


                    <a
                        href="{{ route('ekstrakulikuler.landing') }}"
                        class="landing-service-link"
                    >

                        Lihat Kegiatan

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </article>

            </div>


            {{-- =================================================
                 03 - GALERI
            ================================================== --}}
            <div
                class="col-md-6 col-xl-3"
                data-aos="fade-up"
                data-aos-delay="200"
            >

                <article class="landing-service-card">

                    <div class="landing-service-number">
                        03
                    </div>


                    <div class="landing-service-icon">

                        <i class="bi bi-images"></i>

                    </div>


                    <div class="landing-service-content">

                        <span class="landing-service-label">
                            Dokumentasi
                        </span>

                        <h3>
                            Galeri Sekolah
                        </h3>

                        <p>
                            Lihat berbagai dokumentasi kegiatan,
                            suasana sekolah, dan momen penting
                            dalam bentuk foto.
                        </p>

                    </div>


                    <a
                        href="{{ route('galeri.landing') }}"
                        class="landing-service-link"
                    >

                        Lihat Galeri

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </article>

            </div>


            {{-- =================================================
                 04 - BERITA
            ================================================== --}}
            <div
                class="col-md-6 col-xl-3"
                data-aos="fade-up"
                data-aos-delay="300"
            >

                <article class="landing-service-card">

                    <div class="landing-service-number">
                        04
                    </div>


                    <div class="landing-service-icon">

                        <i class="bi bi-newspaper"></i>

                    </div>


                    <div class="landing-service-content">

                        <span class="landing-service-label">
                            Informasi Terbaru
                        </span>

                        <h3>
                            Berita & Pengumuman
                        </h3>

                        <p>
                            Dapatkan kabar terbaru dan pengumuman
                            penting yang disampaikan oleh sekolah.
                        </p>

                    </div>


                    <a
                        href="{{ route('berita.landing') }}"
                        class="landing-service-link"
                    >

                        Lihat Informasi

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </article>

            </div>


        </div>

    </div>

</section>


<section id="profil" class="landing-profile-section">

    <div class="container">


        {{-- =====================================================
             SECTION HEADER
        ====================================================== --}}
        <div
            class="section-title text-center landing-profile-header"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Profil Sekolah
            </div>

            <h2>
                Mengenal Sekolah Lebih Dekat
            </h2>

            <p>
                Kenali lebih dekat identitas, perjalanan, dan
                nilai-nilai yang menjadi bagian dari sekolah.
            </p>

        </div>


        {{-- =====================================================
             PROFILE CARD
        ====================================================== --}}
        <div
            class="landing-profile-card"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <div class="row g-0 align-items-stretch">


                {{-- =================================================
                     FOTO SEKOLAH
                ================================================== --}}
                <div class="col-lg-5">

                    <div class="landing-profile-image-wrap">

                        @if(!empty($profil?->foto))

                            <img
                                src="{{ asset(
                                    'assets/images/sekolah/' .
                                    $profil->foto
                                ) }}"
                                alt="Foto {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                                class="landing-profile-image"
                            >

                        @else

                            <div class="landing-profile-placeholder">

                                <i class="bi bi-building"></i>

                                <span>
                                    Foto sekolah belum tersedia
                                </span>

                            </div>

                        @endif


                        {{-- OVERLAY --}}

                        <div class="landing-profile-image-overlay"></div>


                        {{-- LABEL --}}

                        <div class="landing-profile-image-label">

                            <i class="bi bi-stars"></i>

                            <span>
                                Profil Sekolah
                            </span>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     INFORMASI SEKOLAH
                ================================================== --}}
                <div class="col-lg-7">

                    <div class="landing-profile-body">


                        {{-- LABEL --}}

                        <span class="landing-profile-label">
                            Tentang Kami
                        </span>


                        {{-- NAMA SEKOLAH --}}

                        <h3 class="landing-profile-title">

                            {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}

                        </h3>


                        {{-- DESKRIPSI --}}

                        <p class="landing-profile-description">

                            {{ \Illuminate\Support\Str::limit(
                                strip_tags(
                                    $profil->deskripsi ??
                                    'Deskripsi sekolah belum tersedia.'
                                ),
                                260
                            ) }}

                        </p>


                        {{-- =================================================
                             INFORMATION CARDS
                        ================================================== --}}

                        <div class="landing-profile-info-grid">


                            {{-- KEPALA SEKOLAH --}}

                            <div class="landing-profile-info-item">

                                <div class="landing-profile-info-icon">

                                    <i class="bi bi-person-badge-fill"></i>

                                </div>

                                <div>

                                    <span>
                                        Kepala Sekolah
                                    </span>

                                    <strong>
                                        {{ $profil->kepala_sekolah ?? '-' }}
                                    </strong>

                                </div>

                            </div>


                            {{-- TAHUN BERDIRI --}}

                            <div class="landing-profile-info-item">

                                <div class="landing-profile-info-icon">

                                    <i class="bi bi-calendar-check-fill"></i>

                                </div>

                                <div>

                                    <span>
                                        Tahun Berdiri
                                    </span>

                                    <strong>
                                        {{ $profil->tahun_berdiri ?? '-' }}
                                    </strong>

                                </div>

                            </div>


                            {{-- NPSN --}}

                            <div class="landing-profile-info-item">

                                <div class="landing-profile-info-icon">

                                    <i class="bi bi-upc-scan"></i>

                                </div>

                                <div>

                                    <span>
                                        NPSN
                                    </span>

                                    <strong>
                                        {{ $profil->npsn ?? '-' }}
                                    </strong>

                                </div>

                            </div>


                            {{-- KONTAK --}}

                            <div class="landing-profile-info-item">

                                <div class="landing-profile-info-icon">

                                    <i class="bi bi-telephone-fill"></i>

                                </div>

                                <div>

                                    <span>
                                        Kontak
                                    </span>

                                    <strong>
                                        {{ $profil->kontak ?? '-' }}
                                    </strong>

                                </div>

                            </div>


                        </div>


                        {{-- =================================================
                             VISI & MISI
                        ================================================== --}}

                        <div class="landing-profile-vision">

                            <div class="landing-profile-vision-icon">

                                <i class="bi bi-quote"></i>

                            </div>

                            <div>

                                <span>
                                    Visi & Misi
                                </span>

                                <p>

                                    {{ \Illuminate\Support\Str::limit(
                                        strip_tags(
                                            $profil->visi_misi ??
                                            'Visi dan misi sekolah belum tersedia.'
                                        ),
                                        240
                                    ) }}

                                </p>

                            </div>

                        </div>


                        {{-- =================================================
                             ACTION
                        ================================================== --}}

                        <div class="landing-profile-action">

                            <a
                                href="{{ route('profil.landing') }}"
                                class="landing-profile-button"
                            >

                                Lihat Profil Lengkap

                                <i class="bi bi-arrow-right"></i>

                            </a>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section id="prestasi" class="landing-achievement-section">

    <div class="container">

        <!-- HEADER -->
        <div class="landing-section-header" data-aos="fade-up">

            <div class="landing-section-heading">

                <span class="landing-section-label">
                    <i class="bi bi-trophy-fill"></i>
                    Prestasi Sekolah
                </span>

                <h2>
                    Prestasi &amp;
                    <span>Pencapaian</span>
                </h2>

                <p>
                    Berbagai pencapaian yang diraih sekolah sebagai
                    hasil dari kerja keras, kreativitas, dan semangat
                    seluruh warga sekolah.
                </p>

            </div>

            <a href="{{ route('prestasi.landing') }}"
               class="btn btn-primary-custom">

                Lihat Semua Prestasi
                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>


        @if($prestasiTerbaru->count() > 0)

            <!-- CAROUSEL -->
            <div id="prestasiCarousel"
                 class="carousel slide landing-content-carousel"
                 data-bs-ride="false">

                <div class="carousel-inner">

                    @foreach($prestasiTerbaru->chunk(3) as $slideIndex => $items)

                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">

                            <div class="row g-4">

                                @foreach($items as $item)

                                    <div class="col-md-6 col-lg-4"
                                         data-aos="fade-up">

                                        <article class="achievement-modern-card">

                                            <!-- IMAGE -->
                                            <div class="achievement-modern-image-wrap">

                                                @if($item->foto)

                                                    <img
                                                        src="{{ asset('assets/images/prestasi/' . $item->foto) }}"
                                                        alt="{{ $item->nama_prestasi }}"
                                                        class="achievement-modern-image"
                                                    >

                                                @else

                                                    <div class="achievement-modern-placeholder">
                                                        <i class="bi bi-trophy-fill"></i>
                                                    </div>

                                                @endif


                                                <!-- OVERLAY -->
                                                <div class="achievement-modern-overlay"></div>


                                                <!-- YEAR -->
                                                <span class="achievement-modern-year">
                                                    <i class="bi bi-calendar3"></i>
                                                    {{ $item->tahun_ajaran }}
                                                </span>


                                                <!-- ICON -->
                                                <span class="achievement-modern-icon">
                                                    <i class="bi bi-award-fill"></i>
                                                </span>

                                            </div>


                                            <!-- BODY -->
                                            <div class="achievement-modern-body">

                                                <span class="achievement-modern-category">
                                                    PRESTASI SEKOLAH
                                                </span>

                                                <h3>
                                                    {{ $item->nama_prestasi }}
                                                </h3>

                                                <p>

                                                    @if(!empty($item->deskripsi))

                                                        {{ Str::limit(strip_tags($item->deskripsi), 105) }}

                                                    @else

                                                        Pencapaian yang berhasil
                                                        diraih oleh sekolah.

                                                    @endif

                                                </p>


                                                <div class="achievement-modern-footer">

                                                    <span class="achievement-modern-status">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                        Pencapaian
                                                    </span>

                                                    <a href="{{ route('prestasi.detail', $item->id) }}"
                                                       class="achievement-modern-link">

                                                        Detail

                                                        <i class="bi bi-arrow-up-right"></i>

                                                    </a>

                                                </div>

                                            </div>

                                        </article>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>


                <!-- CAROUSEL CONTROLS -->
                @if($prestasiTerbaru->count() > 3)

                    <div class="landing-carousel-controls">

                        <button
                            class="landing-carousel-btn"
                            type="button"
                            data-bs-target="#prestasiCarousel"
                            data-bs-slide="prev"
                            aria-label="Prestasi sebelumnya">

                            <i class="bi bi-arrow-left"></i>

                        </button>


                        <span class="landing-carousel-label">
                            Geser untuk melihat prestasi lainnya
                        </span>


                        <button
                            class="landing-carousel-btn"
                            type="button"
                            data-bs-target="#prestasiCarousel"
                            data-bs-slide="next"
                            aria-label="Prestasi berikutnya">

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </div>

                @endif

            </div>


        @else

            <!-- EMPTY -->
            <div class="landing-empty-state">

                <div class="landing-empty-icon">
                    <i class="bi bi-trophy"></i>
                </div>

                <h3>
                    Belum Ada Data Prestasi
                </h3>

                <p>
                    Data prestasi sekolah belum tersedia.
                </p>

            </div>

        @endif

    </div>

</section>


<section id="ekstrakulikuler" class="landing-modern-card-section">

    <div class="container">

        {{-- HEADER SECTION --}}
        <div class="landing-section-header" data-aos="fade-up">

            <div class="landing-section-heading">

                <span class="landing-section-label">
                    <i class="bi bi-stars"></i>
                    KEGIATAN SISWA
                </span>

                <h2>
                    Ekstrakulikuler &amp;
                    <span>Pengembangan Diri</span>
                </h2>

                <p>
                    Beragam kegiatan untuk mengembangkan bakat,
                    minat, kreativitas, dan keterampilan siswa.
                </p>

            </div>

            <a
                href="{{ route('ekstrakulikuler.landing') }}"
                class="btn btn-primary-custom"
            >
                Lihat Semua Ekstrakulikuler
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>


        {{-- DATA EKSTRAKULIKULER --}}
        @if($ekstrakulikulerTerbaru->count() > 0)

            <div
                id="ekstrakulikulerCarousel"
                class="carousel slide landing-content-carousel"
                data-bs-ride="false"
            >

                <div class="carousel-inner">

                    @foreach($ekstrakulikulerTerbaru->chunk(3) as $slideIndex => $items)

                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">

                            <div class="row g-4 align-items-stretch">

                                @foreach($items as $item)

                                    <div
                                        class="col-md-6 col-lg-4"
                                        data-aos="fade-up"
                                    >

                                        <article class="achievement-modern-card">

                                            {{-- FOTO --}}
                                            <div class="achievement-modern-image-wrap">

                                                @if($item->gambar)

                                                    <img
                                                        src="{{ asset('assets/images/ekstrakulikuler/' . $item->gambar) }}"
                                                        alt="{{ $item->nama_eskul }}"
                                                        class="achievement-modern-image"
                                                        loading="lazy"
                                                    >

                                                @else

                                                    <div class="achievement-modern-placeholder">
                                                        <i class="bi bi-people-fill"></i>
                                                    </div>

                                                @endif

                                                {{-- OVERLAY --}}
                                                <div class="achievement-modern-overlay"></div>

                                                {{-- BADGE --}}
                                                <span class="achievement-modern-year">
                                                    <i class="bi bi-stars"></i>
                                                    Ekstrakulikuler
                                                </span>

                                                {{-- ICON --}}
                                                <span class="achievement-modern-icon">
                                                    <i class="bi bi-people-fill"></i>
                                                </span>

                                            </div>


                                            {{-- INFORMASI --}}
                                            <div class="achievement-modern-body d-flex flex-column">

                                                <span class="achievement-modern-category">
                                                    KEGIATAN SISWA
                                                </span>

                                                <h3>
                                                    {{ $item->nama_eskul }}
                                                </h3>

                                                <p>
                                                    {{ \Illuminate\Support\Str::limit(
                                                        strip_tags(
                                                            $item->deskripsi ??
                                                            'Informasi kegiatan ekstrakulikuler sekolah.'
                                                        ),
                                                        120
                                                    ) }}
                                                </p>


                                                {{-- JADWAL --}}
                                                <div class="landing-card-meta">

                                                    <i class="bi bi-calendar-event"></i>

                                                    <span>
                                                        {{ $item->jadwal_latihan ?? 'Jadwal belum tersedia' }}
                                                    </span>

                                                </div>


                                                {{-- PEMBINA DAN DETAIL --}}
                                                <div class="achievement-modern-footer mt-auto">

                                                    <span class="achievement-modern-status">
                                                        <i class="bi bi-person-badge"></i>

                                                        {{ \Illuminate\Support\Str::limit(
                                                            $item->pembina ?? 'Pembina belum tersedia',
                                                            20
                                                        ) }}
                                                    </span>

                                                    <a
                                                        href="{{ route('ekstrakulikuler.detail', $item->id) }}"
                                                        class="achievement-modern-link"
                                                    >
                                                        Detail
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>

                                                </div>

                                            </div>

                                        </article>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- KONTROL CAROUSEL --}}
            @if($ekstrakulikulerTerbaru->count() > 3)

                <div class="landing-carousel-controls">

                    <button
                        type="button"
                        class="landing-carousel-btn"
                        data-bs-target="#ekstrakulikulerCarousel"
                        data-bs-slide="prev"
                        aria-label="Ekstrakulikuler sebelumnya"
                    >
                        <i class="bi bi-arrow-left"></i>
                    </button>

                    <span class="landing-carousel-label">
                        Geser untuk melihat kegiatan lainnya
                    </span>

                    <button
                        type="button"
                        class="landing-carousel-btn"
                        data-bs-target="#ekstrakulikulerCarousel"
                        data-bs-slide="next"
                        aria-label="Ekstrakulikuler berikutnya"
                    >
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>

            @endif

        @else

            {{-- DATA KOSONG --}}
            <div class="landing-empty-state">

                <div class="landing-empty-icon">
                    <i class="bi bi-people"></i>
                </div>

                <h3>
                    Belum Ada Ekstrakulikuler
                </h3>

                <p>
                    Informasi kegiatan ekstrakulikuler akan
                    ditampilkan setelah data ditambahkan.
                </p>

            </div>

        @endif

    </div>

</section>



<section id="guru" class="landing-teacher-section">

    <div class="container">

        <!-- HEADER -->
        <div class="landing-section-header" data-aos="fade-up">

            <div class="landing-section-heading">

                <span class="landing-section-label">
                    <i class="bi bi-people-fill"></i>
                    Tenaga Pendidik
                </span>

                <h2>
                    Guru &amp; Tenaga
                    <span>Pendidik</span>
                </h2>

                <p>
                    Mengenal lebih dekat tenaga pendidik yang berperan
                    dalam membimbing, mendidik, dan mendampingi siswa.
                </p>

            </div>

            <a href="{{ route('guru.landing') }}"
               class="btn btn-primary-custom">

                Lihat Semua Guru
                <i class="bi bi-arrow-right ms-1"></i>

            </a>

        </div>


        @if($guruTerbaru->count() > 0)

            <!-- CAROUSEL -->
            <div id="guruCarousel"
                 class="carousel slide landing-content-carousel"
                 data-bs-ride="false">

                <div class="carousel-inner">

                    @foreach($guruTerbaru->chunk(3) as $slideIndex => $items)

                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">

                            <div class="row g-4">

                                @foreach($items as $item)

                                    <div class="col-md-6 col-lg-4"
                                         data-aos="fade-up">

                                        <article class="teacher-modern-card">

                                            <!-- IMAGE -->
                                            <div class="teacher-modern-image-wrap">

                                                @if($item->foto)

                                                    <img
                                                        src="{{ asset('assets/images/guru/' . $item->foto) }}"
                                                        alt="{{ $item->nama_guru }}"
                                                        class="teacher-modern-image"
                                                    >

                                                @else

                                                    <div class="teacher-modern-placeholder">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>

                                                @endif


                                                <div class="teacher-modern-overlay"></div>


                                                <!-- BADGE -->
                                                <span class="teacher-modern-badge">
                                                    <i class="bi bi-person-check-fill"></i>
                                                    Guru
                                                </span>


                                                <!-- BOTTOM PHOTO INFO -->
                                                <div class="teacher-modern-photo-info">

                                                    <span>
                                                        <i class="bi bi-book-fill"></i>
                                                        {{ $item->mapel }}
                                                    </span>

                                                </div>

                                            </div>


                                            <!-- BODY -->
                                            <div class="teacher-modern-body">

                                                <span class="teacher-modern-category">
                                                    TENAGA PENDIDIK
                                                </span>

                                                <h3>
                                                    {{ $item->nama_guru }}
                                                </h3>


                                                <div class="teacher-modern-detail">

                                                    <div class="teacher-modern-detail-item">

                                                        <span class="teacher-modern-detail-icon">
                                                            <i class="bi bi-book"></i>
                                                        </span>

                                                        <div>

                                                            <small>
                                                                Mata Pelajaran
                                                            </small>

                                                            <strong>
                                                                {{ $item->mapel }}
                                                            </strong>

                                                        </div>

                                                    </div>


                                                    @if(!empty($item->nip))

                                                        <div class="teacher-modern-detail-item">

                                                            <span class="teacher-modern-detail-icon">
                                                                <i class="bi bi-person-vcard"></i>
                                                            </span>

                                                            <div>

                                                                <small>
                                                                    NIP
                                                                </small>

                                                                <strong>
                                                                    {{ $item->nip }}
                                                                </strong>

                                                            </div>

                                                        </div>

                                                    @endif

                                                </div>


                                                <a href="{{ route('guru.detail', $item->id) }}"
                                                   class="teacher-modern-link">

                                                    Lihat Profil

                                                    <span>
                                                        <i class="bi bi-arrow-up-right"></i>
                                                    </span>

                                                </a>

                                            </div>

                                        </article>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>


                <!-- CAROUSEL CONTROLS -->
                @if($guruTerbaru->count() > 3)

                    <div class="landing-carousel-controls">

                        <button
                            class="landing-carousel-btn"
                            type="button"
                            data-bs-target="#guruCarousel"
                            data-bs-slide="prev"
                            aria-label="Guru sebelumnya">

                            <i class="bi bi-arrow-left"></i>

                        </button>


                        <span class="landing-carousel-label">
                            Geser untuk melihat guru lainnya
                        </span>


                        <button
                            class="landing-carousel-btn"
                            type="button"
                            data-bs-target="#guruCarousel"
                            data-bs-slide="next"
                            aria-label="Guru berikutnya">

                            <i class="bi bi-arrow-right"></i>

                        </button>

                    </div>

                @endif

            </div>


        @else

            <!-- EMPTY -->
            <div class="landing-empty-state">

                <div class="landing-empty-icon">
                    <i class="bi bi-people"></i>
                </div>

                <h3>
                    Belum Ada Data Guru
                </h3>

                <p>
                    Data guru dan tenaga pendidik belum tersedia.
                </p>

            </div>

        @endif

    </div>

</section>



{{-- =========================================================
     GALERI SEKOLAH
========================================================= --}}

<section id="galeri" class="landing-modern-card-section landing-modern-card-section-soft">

    <div class="container">

        {{-- HEADER SECTION --}}
        <div class="landing-section-header" data-aos="fade-up">

            <div class="landing-section-heading">

                <span class="landing-section-label">
                    <i class="bi bi-images"></i>
                    DOKUMENTASI SEKOLAH
                </span>

                <h2>
                    Galeri &amp;
                    <span>Kegiatan Sekolah</span>
                </h2>

                <p>
                    Dokumentasi berbagai momen, kegiatan,
                    dan aktivitas warga sekolah.
                </p>

            </div>

            <a
                href="{{ route('galeri.landing') }}"
                class="btn btn-primary-custom"
            >
                Lihat Semua Galeri
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>


        {{-- DATA GALERI --}}
        @if($galeriTerbaru->count() > 0)

            <div
                id="galeriCarousel"
                class="carousel slide landing-content-carousel"
                data-bs-ride="false"
            >

                <div class="carousel-inner">

                    @foreach($galeriTerbaru->chunk(3) as $slideIndex => $items)

                        <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">

                            <div class="row g-4 align-items-stretch">

                                @foreach($items as $item)

                                    <div
                                        class="col-md-6 col-lg-4"
                                        data-aos="fade-up"
                                    >

                                        <article class="achievement-modern-card">

                                            {{-- FOTO --}}
                                            <div class="achievement-modern-image-wrap">

                                                @if($item->file)

                                                    <img
                                                        src="{{ asset('assets/images/galeri/' . $item->file) }}"
                                                        alt="{{ $item->judul }}"
                                                        class="achievement-modern-image"
                                                        loading="lazy"
                                                    >

                                                @else

                                                    <div class="achievement-modern-placeholder">
                                                        <i class="bi bi-images"></i>
                                                    </div>

                                                @endif

                                                {{-- OVERLAY --}}
                                                <div class="achievement-modern-overlay"></div>

                                                {{-- TANGGAL --}}
                                                <span class="achievement-modern-year">
                                                    <i class="bi bi-calendar3"></i>

                                                    {{ !empty($item->tanggal)
                                                        ? \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y')
                                                        : 'Tanggal belum tersedia'
                                                    }}
                                                </span>

                                                {{-- ICON --}}
                                                <span class="achievement-modern-icon">
                                                    <i class="bi bi-images"></i>
                                                </span>

                                            </div>


                                            {{-- INFORMASI --}}
                                            <div class="achievement-modern-body d-flex flex-column">

                                                <span class="achievement-modern-category">
                                                    GALERI SEKOLAH
                                                </span>

                                                <h3>
                                                    {{ $item->judul }}
                                                </h3>

                                                <p>
                                                    {{ \Illuminate\Support\Str::limit(
                                                        strip_tags(
                                                            $item->keterangan ??
                                                            'Dokumentasi kegiatan sekolah.'
                                                        ),
                                                        120
                                                    ) }}
                                                </p>


                                                {{-- DETAIL --}}
                                                <div class="achievement-modern-footer mt-auto">

                                                    <span class="achievement-modern-status">
                                                        <i class="bi bi-camera-fill"></i>
                                                        Dokumentasi
                                                    </span>

                                                    <a
                                                        href="{{ route('galeri.detail', $item->id) }}"
                                                        class="achievement-modern-link"
                                                    >
                                                        Lihat Detail
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>

                                                </div>

                                            </div>

                                        </article>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- KONTROL CAROUSEL --}}
            @if($galeriTerbaru->count() > 3)

                <div class="landing-carousel-controls">

                    <button
                        type="button"
                        class="landing-carousel-btn"
                        data-bs-target="#galeriCarousel"
                        data-bs-slide="prev"
                        aria-label="Galeri sebelumnya"
                    >
                        <i class="bi bi-arrow-left"></i>
                    </button>

                    <span class="landing-carousel-label">
                        Geser untuk melihat dokumentasi lainnya
                    </span>

                    <button
                        type="button"
                        class="landing-carousel-btn"
                        data-bs-target="#galeriCarousel"
                        data-bs-slide="next"
                        aria-label="Galeri berikutnya"
                    >
                        <i class="bi bi-arrow-right"></i>
                    </button>

                </div>

            @endif

        @else

            {{-- DATA KOSONG --}}
            <div class="landing-empty-state">

                <div class="landing-empty-icon">
                    <i class="bi bi-images"></i>
                </div>

                <h3>
                    Belum Ada Dokumentasi
                </h3>

                <p>
                    Dokumentasi foto kegiatan sekolah akan
                    ditampilkan setelah data ditambahkan.
                </p>

            </div>

        @endif

    </div>

</section>



<section id="berita" class="landing-information-section">

    <div class="container">

        {{-- =====================================================
             HEADER SECTION
        ====================================================== --}}
        <div
            class="section-title text-center landing-information-header"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Informasi Terbaru
            </div>

            <h2>
                Berita & Pengumuman Sekolah
            </h2>

            <p>
                Dapatkan informasi terbaru mengenai kegiatan,
                kabar, dan pengumuman penting dari sekolah.
            </p>

        </div>


        {{-- =====================================================
             ACTION
        ====================================================== --}}
        <div
            class="landing-information-action"
            data-aos="fade-up"
            data-aos-delay="100"
        >

            <a
                href="{{ route('berita.landing') }}"
                class="landing-information-button"
            >

                Lihat Semua Informasi

                <i class="bi bi-arrow-right"></i>

            </a>

        </div>


        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}
        <div class="row g-4">


            {{-- =================================================
                 BERITA
            ================================================== --}}
            <div class="col-lg-7">

                <div
                    class="landing-news-area"
                    data-aos="fade-up"
                    data-aos-delay="150"
                >

                    {{-- LABEL --}}
                    <div class="landing-information-heading">

                        <div>

                            <span class="landing-information-mini-label">
                                <i class="bi bi-newspaper"></i>
                                BERITA SEKOLAH
                            </span>

                            <h3>
                                Kabar Terbaru Sekolah
                            </h3>

                        </div>


                        <span class="landing-information-count">
                            {{ $beritaTerbaru->count() }} Berita
                        </span>

                    </div>


                    @php

                        $beritaUtama =
                            $beritaTerbaru->first();

                        $beritaLainnya =
                            $beritaTerbaru->skip(1);

                    @endphp


                    {{-- =================================================
                         BERITA UTAMA
                    ================================================== --}}
                    @if($beritaUtama)

                        @php
                            $isiBeritaUtama =
                                trim(
                                    strip_tags(
                                        $beritaUtama->isi ?? ''
                                    )
                                );
                        @endphp


                        <article class="landing-feature-news">

                            {{-- FOTO --}}

                            <div class="landing-feature-news-image-wrap">

                                @if(!empty($beritaUtama->gambar))

                                    <img
                                        src="{{ asset(
                                            'assets/images/berita/' .
                                            $beritaUtama->gambar
                                        ) }}"
                                        alt="{{ $beritaUtama->judul }}"
                                        class="landing-feature-news-image"
                                    >

                                @else

                                    <div class="landing-feature-news-placeholder">

                                        <i class="bi bi-newspaper"></i>

                                    </div>

                                @endif


                                {{-- BADGE --}}

                                <span class="landing-feature-news-badge">

                                    <i class="bi bi-newspaper"></i>

                                    Berita Terbaru

                                </span>

                            </div>


                            {{-- CONTENT --}}

                            <div class="landing-feature-news-body">

                                <div class="landing-news-meta">

                                    <span>

                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::parse(
                                            $beritaUtama->tanggal
                                        )->translatedFormat('d F Y') }}

                                    </span>

                                    <span>
                                        <i class="bi bi-circle-fill"></i>
                                        Publish
                                    </span>

                                </div>


                                <h4>
                                    {{ $beritaUtama->judul }}
                                </h4>


                                @if($isiBeritaUtama !== '')

                                    <p>

                                        {{ \Illuminate\Support\Str::limit(
                                            $isiBeritaUtama,
                                            170
                                        ) }}

                                    </p>

                                @else

                                    <p>
                                        Informasi berita sekolah.
                                    </p>

                                @endif


                                <a
                                    href="{{ route(
                                        'berita.detail',
                                        $beritaUtama->id
                                    ) }}"
                                    class="landing-news-detail"
                                >

                                    Baca Selengkapnya

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    @endif


                    {{-- =================================================
                         BERITA LAINNYA
                    ================================================== --}}
                    @if($beritaLainnya->count() > 0)

                        <div class="landing-small-news-grid">

                            @foreach($beritaLainnya as $item)

                                @php

                                    $isiBerita =
                                        trim(
                                            strip_tags(
                                                $item->isi ?? ''
                                            )
                                        );

                                @endphp


                                <article class="landing-small-news-card">


                                    {{-- FOTO --}}

                                    <div class="landing-small-news-image-wrap">

                                        @if(!empty($item->gambar))

                                            <img
                                                src="{{ asset(
                                                    'assets/images/berita/' .
                                                    $item->gambar
                                                ) }}"
                                                alt="{{ $item->judul }}"
                                                class="landing-small-news-image"
                                            >

                                        @else

                                            <div class="landing-small-news-placeholder">

                                                <i class="bi bi-newspaper"></i>

                                            </div>

                                        @endif

                                    </div>


                                    {{-- CONTENT --}}

                                    <div class="landing-small-news-body">

                                        <span class="landing-small-news-date">

                                            <i class="bi bi-calendar3"></i>

                                            {{ \Carbon\Carbon::parse(
                                                $item->tanggal
                                            )->translatedFormat('d M Y') }}

                                        </span>


                                        <h4>
                                            {{ \Illuminate\Support\Str::limit(
                                                $item->judul,
                                                55
                                            ) }}
                                        </h4>


                                        <p>

                                            {{ \Illuminate\Support\Str::limit(
                                                $isiBerita,
                                                80
                                            ) }}

                                        </p>


                                        <a
                                            href="{{ route(
                                                'berita.detail',
                                                $item->id
                                            ) }}"
                                        >

                                            Detail

                                            <i class="bi bi-arrow-right"></i>

                                        </a>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @endif


                    {{-- EMPTY NEWS --}}

                    @if($beritaTerbaru->count() === 0)

                        <div class="landing-information-empty">

                            <div class="landing-information-empty-icon">

                                <i class="bi bi-newspaper"></i>

                            </div>

                            <h4>
                                Belum Ada Berita
                            </h4>

                            <p>
                                Belum ada berita yang dipublikasikan
                                oleh sekolah.
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- =================================================
                 PENGUMUMAN
            ================================================== --}}
            <div class="col-lg-5">

                <div
                    class="landing-announcement-area"
                    data-aos="fade-up"
                    data-aos-delay="250"
                >

                    {{-- HEADER --}}

                    <div class="landing-information-heading">

                        <div>

                            <span
                                class="landing-information-mini-label announcement"
                            >
                                <i class="bi bi-megaphone-fill"></i>
                                PENGUMUMAN
                            </span>

                            <h3>
                                Informasi Penting
                            </h3>

                        </div>


                        <div class="landing-announcement-icon">

                            <i class="bi bi-megaphone-fill"></i>

                        </div>

                    </div>


                    {{-- LIST PENGUMUMAN --}}

                    @if($pengumumanTerbaru->count() > 0)

                        <div class="landing-announcement-list">

                            @foreach($pengumumanTerbaru as $item)

                                @php

                                    $isiPengumuman =
                                        trim(
                                            strip_tags(
                                                $item->isi ?? ''
                                            )
                                        );

                                @endphp


                                <article
                                    class="landing-announcement-item"
                                >

                                    {{-- DATE BOX --}}

                                    <div class="landing-announcement-date">

                                        <span>

                                            {{ \Carbon\Carbon::parse(
                                                $item->tanggal
                                            )->format('d') }}

                                        </span>

                                        <small>

                                            {{ \Carbon\Carbon::parse(
                                                $item->tanggal
                                            )->translatedFormat('M') }}

                                        </small>

                                    </div>


                                    {{-- CONTENT --}}

                                    <div class="landing-announcement-content">

                                        <div class="landing-announcement-meta">

                                            <span>
                                                <i class="bi bi-check-circle-fill"></i>
                                                Published
                                            </span>

                                        </div>


                                        <h4>
                                            {{ $item->judul }}
                                        </h4>


                                        @if($isiPengumuman !== '')

                                            <p>

                                                {{ \Illuminate\Support\Str::limit(
                                                    $isiPengumuman,
                                                    105
                                                ) }}

                                            </p>

                                        @else

                                            <p>
                                                Informasi pengumuman sekolah.
                                            </p>

                                        @endif

                                    </div>


                                    {{-- ARROW --}}

                                    <div class="landing-announcement-arrow">

                                        <i class="bi bi-chevron-right"></i>

                                    </div>

                                </article>

                            @endforeach

                        </div>

                    @else

                        <div class="landing-information-empty announcement-empty">

                            <div class="landing-information-empty-icon">

                                <i class="bi bi-megaphone"></i>

                            </div>

                            <h4>
                                Belum Ada Pengumuman
                            </h4>

                            <p>
                                Belum ada pengumuman yang dipublikasikan
                                oleh sekolah.
                            </p>

                        </div>

                    @endif


                    {{-- FOOTER BOX --}}

                    <div class="landing-announcement-footer">

                        <div>

                            <i class="bi bi-info-circle-fill"></i>

                            <span>
                                Pastikan selalu mengikuti
                                informasi terbaru sekolah.
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="landing-contact-section" id="kontak">

    <div class="container">

        {{-- SECTION HEADER --}}
        <div class="landing-contact-header">

            <span class="landing-contact-kicker">
                <i class="bi bi-chat-dots-fill"></i>
                Hubungi Kami
            </span>

            <h2>
                Ada Pertanyaan?
                <span>Kami Siap Membantu.</span>
            </h2>

            <p>
                Silakan hubungi pihak sekolah melalui informasi kontak
                yang tersedia. Kami dengan senang hati akan membantu
                memberikan informasi yang Anda butuhkan.
            </p>

        </div>


        {{-- CONTACT WRAPPER --}}
        <div class="landing-contact-wrapper">

            {{-- LEFT SIDE --}}
            <div class="landing-contact-intro">

                <div class="landing-contact-logo">

                    @if($profil && $profil->logo)

                        <img
                            src="{{ asset('assets/images/sekolah/' . $profil->logo) }}"
                            alt="{{ $profil->nama_sekolah ?? 'Logo Sekolah' }}"
                        >

                    @else

                        <i class="bi bi-building"></i>

                    @endif

                </div>


                <span class="landing-contact-label">
                    INFORMASI SEKOLAH
                </span>

                <h3>
                    {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                </h3>

                <p>
                    {{ $profil->deskripsi
                        ? Str::limit(strip_tags($profil->deskripsi), 180)
                        : 'Informasi lengkap mengenai sekolah dapat Anda tanyakan melalui kontak yang tersedia.' }}
                </p>


                {{-- DECORATIVE LINE --}}
                <div class="landing-contact-line"></div>


                {{-- ADDRESS --}}
                <div class="landing-contact-address">

                    <div class="landing-contact-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div>
                        <span>Alamat Sekolah</span>

                        <strong>
                            {{ $profil->alamat ?? 'Alamat belum tersedia' }}
                        </strong>
                    </div>

                </div>

            </div>


            {{-- RIGHT SIDE --}}
            <div class="landing-contact-card">

                <div class="landing-contact-card-top">

                    <div>
                        <span class="landing-contact-label">
                            CONTACT US
                        </span>

                        <h4>
                            Hubungi Kami
                        </h4>
                    </div>

                    <div class="landing-contact-card-icon">
                        <i class="bi bi-send-fill"></i>
                    </div>

                </div>


                {{-- PHONE --}}
                <a
                    href="tel:{{ $profil->kontak ?? '' }}"
                    class="landing-contact-item"
                >

                    <div class="landing-contact-item-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <div class="landing-contact-item-content">

                        <span>Telepon</span>

                        <strong>
                            {{ $profil->kontak ?? 'Nomor belum tersedia' }}
                        </strong>

                    </div>

                    <i class="bi bi-arrow-up-right landing-contact-arrow"></i>

                </a>


                {{-- LOCATION --}}
                <div class="landing-contact-item">

                    <div class="landing-contact-item-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div class="landing-contact-item-content">

                        <span>Lokasi</span>

                        <strong>
                            {{ $profil->alamat ?? 'Alamat belum tersedia' }}
                        </strong>

                    </div>

                </div>


                {{-- SCHOOL YEAR --}}
                <div class="landing-contact-item">

                    <div class="landing-contact-item-icon">
                        <i class="bi bi-calendar-check-fill"></i>
                    </div>

                    <div class="landing-contact-item-content">

                        <span>Tahun Berdiri</span>

                        <strong>
                            {{ $profil->tahun_berdiri ?? '-' }}
                        </strong>

                    </div>

                </div>


                {{-- WHATSAPP BUTTON --}}
                @php
                    $nomorWhatsapp = preg_replace('/[^0-9]/', '', $profil->kontak ?? '');

                    if (str_starts_with($nomorWhatsapp, '0')) {
                        $nomorWhatsapp = '62' . substr($nomorWhatsapp, 1);
                    }
                @endphp

                @if($nomorWhatsapp)

                    <a
                        href="https://wa.me/{{ $nomorWhatsapp }}"
                        target="_blank"
                        class="landing-contact-whatsapp"
                    >
                        <span>
                            <i class="bi bi-whatsapp"></i>
                            Hubungi via WhatsApp
                        </span>

                        <i class="bi bi-arrow-right"></i>
                    </a>

                @else

                    <div class="landing-contact-whatsapp disabled">
                        <span>
                            <i class="bi bi-whatsapp"></i>
                            WhatsApp Belum Tersedia
                        </span>
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>

</main>

<footer class="modern-footer">

    {{-- DECORATIVE BACKGROUND --}}
    <div class="modern-footer-shape modern-footer-shape-one"></div>
    <div class="modern-footer-shape modern-footer-shape-two"></div>


    <div class="container position-relative">

        {{-- =====================================================
             FOOTER MAIN
        ====================================================== --}}
        <div class="modern-footer-main">

            <div class="row g-5">

                {{-- =================================================
                     SCHOOL INFO
                ================================================== --}}
                <div class="col-lg-5">

                    <div class="modern-footer-brand">

                        {{-- LOGO --}}
                        <div class="modern-footer-logo">

                            @if($profil && $profil->logo)

                                <img
                                    src="{{ asset('assets/images/sekolah/' . $profil->logo) }}"
                                    alt="{{ $profil->nama_sekolah ?? 'Logo Sekolah' }}"
                                >

                            @else

                                <i class="bi bi-building"></i>

                            @endif

                        </div>


                        {{-- SCHOOL NAME --}}
                        <div>

                            <h3>
                                {{ $profil->nama_sekolah ?? 'Sistem Informasi Sekolah' }}
                            </h3>

                            <span>
                                Portal Informasi Sekolah
                            </span>

                        </div>

                    </div>


                    <p class="modern-footer-description">

                        {{ \Illuminate\Support\Str::limit(
                            strip_tags(
                                $profil->deskripsi ??
                                'Website resmi sekolah sebagai pusat informasi profil, prestasi, kegiatan, galeri, berita, dan pengumuman sekolah.'
                            ),
                            220
                        ) }}

                    </p>


                    {{-- SOCIAL / CONTACT ICONS --}}
                    <div class="modern-footer-social">

                        <a
                            href="#kontak"
                            aria-label="Kontak"
                        >
                            <i class="bi bi-chat-dots-fill"></i>
                        </a>

                        @php
                            $nomorWhatsapp = preg_replace(
                                '/[^0-9]/',
                                '',
                                $profil->kontak ?? ''
                            );

                            if (str_starts_with($nomorWhatsapp, '0')) {
                                $nomorWhatsapp = '62' . substr($nomorWhatsapp, 1);
                            }
                        @endphp

                        @if($nomorWhatsapp)

                            <a
                                href="https://wa.me/{{ $nomorWhatsapp }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                aria-label="WhatsApp"
                            >
                                <i class="bi bi-whatsapp"></i>
                            </a>

                        @endif

                        <a
                            href="#beranda"
                            aria-label="Kembali ke atas"
                        >
                            <i class="bi bi-arrow-up"></i>
                        </a>

                    </div>

                </div>


                {{-- =================================================
                     QUICK LINKS
                ================================================== --}}
                <div class="col-6 col-lg-3">

                    <div class="modern-footer-column">

                        <span class="modern-footer-title">
                            Navigasi
                        </span>


                        <ul class="modern-footer-links">

                            <li>
                                <a href="#beranda">
                                    <i class="bi bi-chevron-right"></i>
                                    Beranda
                                </a>
                            </li>

                            <li>
                                <a href="#profil">
                                    <i class="bi bi-chevron-right"></i>
                                    Profil
                                </a>
                            </li>

                            <li>
                                <a href="#prestasi">
                                    <i class="bi bi-chevron-right"></i>
                                    Prestasi
                                </a>
                            </li>

                            <li>
                                <a href="#ekstrakulikuler">
                                    <i class="bi bi-chevron-right"></i>
                                    Ekstrakulikuler
                                </a>
                            </li>

                            <li>
                                <a href="#guru">
                                    <i class="bi bi-chevron-right"></i>
                                    Guru
                                </a>
                            </li>

                            <li>
                                <a href="#galeri">
                                    <i class="bi bi-chevron-right"></i>
                                    Galeri
                                </a>
                            </li>

                            <li>
                                <a href="#berita">
                                    <i class="bi bi-chevron-right"></i>
                                    Berita
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>


                {{-- =================================================
                     CONTACT
                ================================================== --}}
                <div class="col-6 col-lg-4">

                    <div class="modern-footer-column">

                        <span class="modern-footer-title">
                            Hubungi Kami
                        </span>


                        {{-- ADDRESS --}}
                        <div class="modern-footer-contact-item">

                            <div class="modern-footer-contact-icon">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>

                            <div>

                                <span>Alamat</span>

                                <p>
                                    {{ $profil->alamat ?? 'Alamat sekolah belum tersedia' }}
                                </p>

                            </div>

                        </div>


                        {{-- PHONE --}}
                        <div class="modern-footer-contact-item">

                            <div class="modern-footer-contact-icon">
                                <i class="bi bi-telephone-fill"></i>
                            </div>

                            <div>

                                <span>Telepon</span>

                                <p>
                                    {{ $profil->kontak ?? 'Nomor kontak belum tersedia' }}
                                </p>

                            </div>

                        </div>


                        {{-- BUTTON --}}
                        <a
                            href="#kontak"
                            class="modern-footer-contact-button"
                        >
                            Lihat Informasi Kontak
                            <i class="bi bi-arrow-right"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             FOOTER BOTTOM
        ====================================================== --}}
        <div class="modern-footer-bottom">

            <div class="modern-footer-copyright">

                <span>
                    © {{ date('Y') }}
                    {{ $profil->nama_sekolah ?? 'Sekolah' }}
                </span>

                <span class="modern-footer-dot">
                    •
                </span>

                <span>
                    All Rights Reserved.
                </span>

            </div>


            <div class="modern-footer-bottom-right">

                <span>
                    Portal Informasi Sekolah
                </span>

                <span class="modern-footer-heart">
                    <i class="bi bi-stars"></i>
                    Informasi dalam satu tempat
                </span>

            </div>

        </div>

    </div>

</footer>

<script src="{{ asset('assets/vendors/bootstrap5.3.3/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/vendors/aos-2.3.4/aos.js') }}"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {


        /* =====================================================
           AOS ANIMATION
        ====================================================== */

        AOS.init({

            duration: 700,

            once: true,

            offset: 80

        });



        /* =====================================================
           ELEMENT STATISTIK
        ====================================================== */

        const statisticSection =
            document.querySelector(
                '.landing-statistics-section'
            );


        const statisticNumbers =
            document.querySelectorAll(
                '.landing-stat-number'
            );


        /*
         * Jika elemen statistik tidak ditemukan,
         * hentikan script.
         */

        if (
            !statisticSection ||
            statisticNumbers.length === 0
        ) {

            return;

        }



        /* =====================================================
           FUNGSI COUNTER
        ====================================================== */

        const animateCounter = (element, delay = 0) => {


            setTimeout(() => {


                const target =
                    parseInt(
                        element.dataset.target,
                        10
                    ) || 0;


                const duration = 1400;


                const startTime =
                    performance.now();


                const updateCounter = (currentTime) => {


                    const elapsed =
                        currentTime - startTime;


                    const progress =
                        Math.min(
                            elapsed / duration,
                            1
                        );


                    /*
                     * Easing:
                     * angka mulai cepat kemudian
                     * perlahan melambat.
                     */

                    const easeOut =
                        1 - Math.pow(
                            1 - progress,
                            3
                        );


                    const currentValue =
                        Math.floor(
                            target * easeOut
                        );


                    element.textContent =
                        currentValue.toLocaleString(
                            'id-ID'
                        );


                    /*
                     * Lanjutkan animasi
                     * sampai mencapai target.
                     */

                    if (progress < 1) {


                        requestAnimationFrame(
                            updateCounter
                        );


                    } else {


                        element.textContent =
                            target.toLocaleString(
                                'id-ID'
                            );


                    }

                };


                requestAnimationFrame(
                    updateCounter
                );


            }, delay);

        };



        /* =====================================================
           JALANKAN COUNTER SAAT STATISTIK
           MASUK KE LAYAR
        ====================================================== */

        let hasAnimated = false;


        const statisticObserver =
            new IntersectionObserver(
                (entries) => {


                    entries.forEach((entry) => {


                        if (
                            entry.isIntersecting &&
                            !hasAnimated
                        ) {


                            hasAnimated = true;


                            statisticNumbers.forEach(
                                (number, index) => {


                                    /*
                                     * Setiap angka dimulai
                                     * sedikit bergantian.
                                     */

                                    animateCounter(
                                        number,
                                        index * 150
                                    );


                                }
                            );


                            /*
                             * Tidak perlu mengamati lagi
                             * setelah animasi dimulai.
                             */

                            statisticObserver.disconnect();

                        }


                    });


                },
                {
                    threshold: 0.25
                }
            );


        statisticObserver.observe(
            statisticSection
        );


    });

</script>
</body>
</html>
