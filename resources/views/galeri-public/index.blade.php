<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Galeri -
        {{ config('app.name', 'Sistem Informasi Sekolah') }}
    </title>

    <meta
        name="description"
        content="Galeri dokumentasi kegiatan sekolah"
    >

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- CSS halaman publik --}}
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

{{-- =========================================================
     NAVBAR
========================================================= --}}

@include('partials.public-navbar')

<main>

{{-- =========================================================
     HERO GALERI
========================================================= --}}

<section class="public-page-hero">

    <div class="container">

        <div
            class="public-page-hero-content"
            data-aos="fade-up"
        >

            <span class="public-page-kicker">

                <i class="bi bi-images"></i>

                Dokumentasi Sekolah

            </span>


            <h1>
                Galeri
                <br>
                Kegiatan Sekolah
            </h1>


            <p>
                Lihat berbagai dokumentasi kegiatan, pembelajaran,
                prestasi, dan aktivitas sekolah dalam bentuk foto
                maupun video.
            </p>


            <div class="public-breadcrumb">

                <a href="{{ route('landing') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Galeri
                </span>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     GALERI
========================================================= --}}

<section class="public-content-section">

    <div class="container">

        <div
            class="section-title text-center mb-5"
            data-aos="fade-up"
        >

            <div class="section-kicker">
                Dokumentasi
            </div>

            <h2>
                Galeri Sekolah
            </h2>

            <p>
                Dokumentasi berbagai kegiatan dan aktivitas
                yang berlangsung di lingkungan sekolah.
            </p>

        </div>


        <div class="row g-4">

            @forelse($galeri as $item)

                <div
                    class="col-md-6 col-lg-4"
                    data-aos="fade-up"
                >

                    <article class="public-gallery-card">


                        {{-- FOTO --}}
                        @if($item->kategori === 'Foto')

                            <div class="public-gallery-image">

                                @if(!empty($item->file))

                                    <img
                                        src="{{ asset('assets/images/galeri/' . $item->file) }}"
                                        alt="{{ $item->judul }}"
                                    >

                                    <div class="public-gallery-overlay">

                                        <span>
                                            <i class="bi bi-image"></i>
                                        </span>

                                    </div>

                                @else

                                    <div class="public-gallery-placeholder">

                                        <i class="bi bi-images"></i>

                                    </div>

                                @endif

                            </div>


                        {{-- VIDEO --}}
                        @elseif($item->kategori === 'Video')

                            <div class="public-gallery-video">

                                @if(!empty($item->file))

                                    <video
                                        controls
                                        preload="metadata"
                                    >

                                        <source
                                            src="{{ asset('assets/images/galeri/' . $item->file) }}"
                                            type="video/mp4"
                                        >

                                        Browser kamu tidak mendukung video.

                                    </video>

                                @else

                                    <div class="public-gallery-placeholder">

                                        <i class="bi bi-camera-video"></i>

                                    </div>

                                @endif

                            </div>

                        @endif


                        {{-- INFORMASI --}}
                        <div class="public-gallery-body">

                            <div class="public-gallery-top">

                                @if($item->kategori === 'Foto')

                                    <span class="public-gallery-badge foto">
                                        <i class="bi bi-image"></i>
                                        Foto
                                    </span>

                                @else

                                    <span class="public-gallery-badge video">
                                        <i class="bi bi-camera-video"></i>
                                        Video
                                    </span>

                                @endif

                                <small>

                                    <i class="bi bi-calendar3"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </small>


                            </div>


                            <h3>
                                {{ $item->judul }}
                            </h3>


                            @if(!empty($item->keterangan))

                            <p>
                            {{ \Illuminate\Support\Str::limit(
                                strip_tags($item->keterangan),
                                140
                                ) }}
                            </p>

                            @else

                            <p>
                                Dokumentasi kegiatan sekolah.
                            </p>

                            @endif
                            <a
                                href="{{ route('galeri.detail', $item->id) }}"
                                class="information-read-more"
                            >
                                Lihat Detail
                                <i class="bi bi-arrow-right"></i>
                            </a>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12">

                    <div class="content-card text-center">

                        <i class="bi bi-images fs-1 text-primary"></i>

                        <h4 class="mt-3">
                            Belum Ada Dokumentasi
                        </h4>

                        <p class="text-secondary mb-0">
                            Data galeri akan ditampilkan setelah
                            ditambahkan melalui dashboard.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- PAGINATION --}}

        @if($galeri->hasPages())

            <div class="public-pagination">

                {{ $galeri->links() }}

            </div>

        @endif

    </div>

</section>

</main>


{{-- =========================================================
     FOOTER
========================================================= --}}


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
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<script
    src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js">
</script>

<script>

    AOS.init({
        duration: 700,
        once: true,
        offset: 80
    });

    document
        .querySelectorAll('.nav-link')
        .forEach(link => {

            link.addEventListener('click', () => {

                const nav =
                    document.getElementById('mainNav');

                if (nav.classList.contains('show')) {

                    bootstrap
                        .Collapse
                        .getOrCreateInstance(nav)
                        .hide();

                }

            });

        });

</script>

</body>

</html>
