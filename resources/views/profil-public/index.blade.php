<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Profil -
        {{ $profil->nama_sekolah ?? 'Sistem Informasi Sekolah' }}
    </title>

    <meta
        name="description"
        content="Profil resmi {{ $profil->nama_sekolah ?? 'sekolah' }}"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/public-page.css') }}"
    >

    <link rel="stylesheet"
      href="{{ asset('assets/css/public-common.css') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css"
        rel="stylesheet"
    >

</head>

<body>

@include('partials.public-navbar')


<main>

<section class="profile-public-hero">

    @if(!empty($profil?->foto))

        <div
            class="profile-public-bg"
            style="
                background-image:
                url('{{ asset('assets/images/sekolah/' . $profil->foto) }}');
            "
        ></div>

    @else

        <div class="profile-public-bg profile-public-bg-empty"></div>

    @endif


    <div class="profile-public-overlay"></div>


    <div class="container">

        <div
            class="profile-public-hero-content"
            data-aos="fade-up"
        >

            <span class="public-page-kicker">

                <i class="bi bi-building"></i>

                Profil Sekolah

            </span>


            <h1>

                Mengenal Lebih Dekat

                <span>
                    {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}
                </span>

            </h1>


            <p>

                {{ \Illuminate\Support\Str::limit(
                    $profil->deskripsi ??
                    'Informasi lengkap mengenai identitas, visi, misi, dan perjalanan sekolah.',
                    220
                ) }}

            </p>


            <div class="public-breadcrumb">

                <a href="{{ route('landing') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Profil
                </span>

            </div>

        </div>

    </div>

</section>

<section class="profile-highlight-section">

    <div class="container">

        <div class="row g-4">

            <div
                class="col-md-6 col-lg-3"
                data-aos="fade-up"
            >

                <div class="profile-highlight-card">

                    <div class="profile-highlight-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>

                        <strong>
                            {{ $jumlahGuru }}
                        </strong>

                        <span>
                            Guru
                        </span>

                    </div>

                </div>

            </div>


            <div
                class="col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div class="profile-highlight-card">

                    <div class="profile-highlight-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div>

                        <strong>
                            {{ $jumlahSiswa }}
                        </strong>

                        <span>
                            Siswa
                        </span>

                    </div>

                </div>

            </div>


            <div
                class="col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="200"
            >

                <div class="profile-highlight-card">

                    <div class="profile-highlight-icon">
                        <i class="bi bi-trophy-fill"></i>
                    </div>

                    <div>

                        <strong>
                            {{ $jumlahPrestasi }}
                        </strong>

                        <span>
                            Prestasi
                        </span>

                    </div>

                </div>

            </div>


            <div
                class="col-md-6 col-lg-3"
                data-aos="fade-up"
                data-aos-delay="300"
            >

                <div class="profile-highlight-card">

                    <div class="profile-highlight-icon">
                        <i class="bi bi-stars"></i>
                    </div>

                    <div>

                        <strong>
                            {{ $jumlahEkstrakulikuler }}
                        </strong>

                        <span>
                            Ekstrakulikuler
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="public-content-section profile-about-section">

    <div class="container">

        <div class="row align-items-center g-5">

            <div
                class="col-lg-6"
                data-aos="fade-right"
            >

                <div class="profile-about-image">

                    @if(!empty($profil?->foto))

                        <img
                            src="{{ asset('assets/images/sekolah/' . $profil->foto) }}"
                            alt="Foto {{ $profil->nama_sekolah ?? 'Sekolah' }}"
                        >

                    @else

                        <div class="profile-about-placeholder">
                            <i class="bi bi-building"></i>
                        </div>

                    @endif


                    <div class="profile-about-badge">

                        <i class="bi bi-patch-check-fill"></i>

                        <div>

                            <small>
                                Berdiri Sejak
                            </small>

                            <strong>
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <div
                class="col-lg-6"
                data-aos="fade-left"
            >

                <div class="section-kicker">
                    Tentang Sekolah
                </div>

                <h2 class="profile-about-title">

                    {{ $profil->nama_sekolah ?? 'Nama Sekolah' }}

                </h2>


                <p class="profile-about-text">

                    {{ $profil->deskripsi ??
                        'Deskripsi sekolah belum diisi pada sistem.'
                    }}

                </p>


                <div class="profile-meta-grid">

                    <div class="profile-meta-box">

                        <i class="bi bi-person-badge"></i>

                        <div>
                            <small>Kepala Sekolah</small>

                            <strong>
                                {{ $profil->kepala_sekolah ?? '-' }}
                            </strong>
                        </div>

                    </div>


                    <div class="profile-meta-box">

                        <i class="bi bi-upc-scan"></i>

                        <div>
                            <small>NPSN</small>

                            <strong>
                                {{ $profil->npsn ?? '-' }}
                            </strong>
                        </div>

                    </div>


                    <div class="profile-meta-box">

                        <i class="bi bi-calendar3"></i>

                        <div>
                            <small>Tahun Berdiri</small>

                            <strong>
                                {{ $profil->tahun_berdiri ?? '-' }}
                            </strong>
                        </div>

                    </div>


                    <div class="profile-meta-box">

                        <i class="bi bi-telephone"></i>

                        <div>
                            <small>Kontak</small>

                            <strong>
                                {{ $profil->kontak ?? '-' }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="profile-vision-section">

    <div class="container">

        <div
            class="section-title text-center mb-5"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Arah Sekolah
            </div>

            <h2>
                Visi & Misi
            </h2>

            <p>
                Landasan yang menjadi arah dalam mengembangkan
                pendidikan dan lingkungan sekolah.
            </p>

        </div>


        <div class="row g-4">

            <div
                class="col-lg-5"
                data-aos="fade-right"
            >

                <div class="vision-card">

                    <div class="vision-icon">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <span>
                        Visi
                    </span>

                    <h3>
                        Menuju Pendidikan yang Lebih Baik
                    </h3>

                    <p>
                        {{ $profil->visi_misi ?? 'Visi sekolah belum diisi.' }}
                    </p>

                </div>

            </div>


            <div
                class="col-lg-7"
                data-aos="fade-left"
            >

                <div class="mission-card">

                    <div class="mission-heading">

                        <div class="mission-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>

                        <div>

                            <span>
                                Nilai & Misi Sekolah
                            </span>

                            <h3>
                                Komitmen dalam Pendidikan
                            </h3>

                        </div>

                    </div>


                    <div class="mission-content">

                        <p>
                            {{ $profil->visi_misi ??
                                'Informasi visi dan misi sekolah belum tersedia.'
                            }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="public-content-section">

    <div class="container">

        <div
            class="section-title text-center mb-5"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Informasi
            </div>

            <h2>
                Identitas Sekolah
            </h2>

            <p>
                Informasi dasar sekolah yang dikelola melalui
                sistem informasi.
            </p>

        </div>


        <div class="row g-4">

            <div
                class="col-lg-6"
                data-aos="fade-up"
            >

                <div class="school-info-card">

                    <div class="school-info-icon">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>

                    <div>

                        <span>
                            Alamat
                        </span>

                        <p>
                            {{ $profil->alamat ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>


            <div
                class="col-lg-6"
                data-aos="fade-up"
                data-aos-delay="100"
            >

                <div class="school-info-card">

                    <div class="school-info-icon">
                        <i class="bi bi-telephone-fill"></i>
                    </div>

                    <div>

                        <span>
                            Kontak
                        </span>

                        <p>
                            {{ $profil->kontak ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section class="profile-cta-section">

    <div class="container">

        <div
            class="profile-cta"
            data-aos="zoom-in"
        >

            <div>

                <span>
                    Portal Informasi Sekolah
                </span>

                <h2>
                    Temukan Lebih Banyak Tentang Sekolah Kami
                </h2>

                <p>
                    Jelajahi prestasi, ekstrakulikuler, guru,
                    galeri, serta berita terbaru sekolah.
                </p>

            </div>


            <div class="profile-cta-buttons">

                <a
                    href="{{ route('prestasi.landing') }}"
                    class="btn btn-light"
                >
                    Lihat Prestasi
                    <i class="bi bi-arrow-right ms-1"></i>
                </a>

                <a
                    href="{{ route('galeri.landing') }}"
                    class="btn btn-outline-light"
                >
                    Lihat Galeri
                    <i class="bi bi-images ms-1"></i>
                </a>

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


<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"
></script>

<script>

    AOS.init({
        duration: 700,
        once: true,
        offset: 80
    });

</script>

</body>
</html>
