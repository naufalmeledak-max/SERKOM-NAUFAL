<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Berita & Pengumuman
        -
        {{ $profil->nama_sekolah ?? 'Sekolah' }}
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/public-page.css') }}"
    >

    <link rel="stylesheet"
      href="{{ asset('assets/css/public-common.css') }}">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >

</head>

<body class="public-page">

@include('partials.public-navbar')

<main>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <section class="public-page-header">

        <div class="container">

            <div class="public-page-header-content">

                <span class="public-page-kicker">
                    Informasi Sekolah
                </span>

                <h1>
                    Berita & Pengumuman
                </h1>

                <p>
                    Semua informasi terbaru mengenai kegiatan,
                    berita, dan pengumuman sekolah.
                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         BERITA SEKOLAH
    ====================================================== --}}

    <section class="public-content-section">

        <div class="container">


            {{-- JUDUL BERITA --}}

            <div class="public-section-heading">

                <div>

                    <span class="public-section-kicker">
                        Berita
                    </span>

                    <h2>
                        Berita Sekolah
                    </h2>

                    <p>
                        Informasi dan kabar terbaru
                        dari sekolah.
                    </p>

                </div>

                <span class="public-section-count">
                    {{ $berita->total() }} Berita
                </span>

            </div>



            {{-- LIST BERITA --}}

            <div class="row g-4">

                @forelse($berita as $item)

                    @php

                        $isiBerita = trim(
                            strip_tags($item->isi ?? '')
                        );

                    @endphp


                    <div
                        class="col-md-6 col-lg-4"
                        data-aos="fade-up"
                    >

                        <article class="news-card">


                            {{-- GAMBAR --}}

                            <div class="news-card-image-wrap">

                                @if($item->gambar)

                                    <img
                                        src="{{ asset('assets/images/berita/' . $item->gambar) }}"
                                        alt="{{ $item->judul }}"
                                        class="news-card-image"
                                    >

                                @else

                                    <div class="news-card-placeholder">

                                        <i class="bi bi-newspaper"></i>

                                    </div>

                                @endif


                                <span class="news-card-badge">

                                    <i class="bi bi-newspaper"></i>

                                    Berita

                                </span>

                            </div>



                            {{-- INFORMASI --}}

                            <div class="news-card-body">


                                {{-- TANGGAL --}}

                                <div class="news-card-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </div>


                                {{-- JUDUL --}}

                                <h3>
                                    {{ $item->judul }}
                                </h3>


                                {{-- ISI --}}

                                @if($isiBerita !== '')

                                    <p>
                                        {{ \Illuminate\Support\Str::limit(
                                            $isiBerita,
                                            120
                                        ) }}
                                    </p>

                                @else

                                    <p>
                                        Belum ada isi berita.
                                    </p>

                                @endif


                                {{-- DETAIL --}}

                                <a
                                    href="{{ route('berita.detail', $item->id) }}"
                                    class="news-card-link"
                                >

                                    Baca Selengkapnya

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    </div>


                @empty


                    <div class="col-12">

                        <div class="public-empty-state">

                            <i class="bi bi-newspaper"></i>

                            <h3>
                                Belum Ada Berita
                            </h3>

                            <p>
                                Belum ada berita yang
                                dipublikasikan oleh sekolah.
                            </p>

                        </div>

                    </div>


                @endforelse

            </div>



            {{-- PAGINATION BERITA --}}

            @if($berita->hasPages())

                <div class="public-pagination">

                    {{ $berita->withQueryString()->links() }}

                </div>

            @endif

        </div>

    </section>



    {{-- =====================================================
         PEMBATAS
    ====================================================== --}}

    <section class="announcement-divider">

        <div class="container">

            <div class="announcement-divider-line"></div>

        </div>

    </section>



    {{-- =====================================================
         PENGUMUMAN SEKOLAH
    ====================================================== --}}

    <section class="announcement-section">

        <div class="container">


            {{-- JUDUL PENGUMUMAN --}}

            <div class="public-section-heading">

                <div>

                    <span class="public-section-kicker announcement-kicker">
                        Pengumuman
                    </span>

                    <h2>
                        Pengumuman Sekolah
                    </h2>

                    <p>
                        Informasi penting yang perlu diketahui
                        oleh warga sekolah.
                    </p>

                </div>

                <span class="public-section-count announcement-count">
                    {{ $pengumuman->total() }}
                    Pengumuman
                </span>

            </div>



            {{-- LIST PENGUMUMAN --}}

            <div class="announcement-list">

                @forelse($pengumuman as $item)

                    @php

                        $isiPengumuman = trim(
                            strip_tags($item->isi ?? '')
                        );

                    @endphp


                    <article class="announcement-item">


                        {{-- ICON --}}

                        <div class="announcement-icon">

                            <i class="bi bi-megaphone-fill"></i>

                        </div>



                        {{-- ISI --}}

                        <div class="announcement-content">


                            {{-- TANGGAL --}}

                            <div class="announcement-meta">

                                <span>

                                    <i class="bi bi-calendar3"></i>

                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}

                                </span>


                                <span class="announcement-status">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Dipublikasikan

                                </span>

                            </div>



                            {{-- JUDUL --}}

                            <h3>
                                {{ $item->judul }}
                            </h3>



                            {{-- ISI --}}

                            @if($isiPengumuman !== '')

                                <p>

                                    {{ \Illuminate\Support\Str::limit(
                                        $isiPengumuman,
                                        180
                                    ) }}

                                </p>

                            @else

                                <p>
                                    Belum ada isi pengumuman.
                                </p>

                            @endif

                        </div>

                    </article>


                @empty


                    <div class="public-empty-state announcement-empty">

                        <i class="bi bi-megaphone"></i>

                        <h3>
                            Belum Ada Pengumuman
                        </h3>

                        <p>
                            Belum ada pengumuman yang
                            dipublikasikan oleh sekolah.
                        </p>

                    </div>


                @endforelse

            </div>



            {{-- PAGINATION PENGUMUMAN --}}

            @if($pengumuman->hasPages())

                <div class="public-pagination">

                    {{ $pengumuman->withQueryString()->links() }}

                </div>

            @endif

        </div>

    </section>

</main>



{{-- =====================================================
     FOOTER
====================================================== --}}

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
