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

<style>
        .student-count {
            margin-bottom: 22px;
            color: #64748b;
            font-size: 13px;
        }

        .student-public-card {
            height: 100%;
            padding: 25px;
            border: 1px solid #e6edf6;
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 10px 28px rgba(15, 35, 75, .05);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .student-public-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 38px rgba(15, 35, 75, .10);
        }

        .student-public-top {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 22px;
        }

        .student-public-avatar {
            display: flex;
            flex: 0 0 58px;
            width: 58px;
            height: 58px;
            align-items: center;
            justify-content: center;
            border-radius: 17px;
            background: #edf4ff;
            color: #2563eb;
            font-size: 27px;
        }

        .student-public-avatar.female {
            background: #f5edff;
            color: #8b5cf6;
        }

        .student-public-type {
            color: #2563eb;
            font-size: 10px;
            font-weight: 800;
            letter-spacing: .8px;
        }

        .student-public-name {
            margin: 4px 0 0;
            color: #14213d;
            font-family: 'Poppins', sans-serif;
            font-size: 17px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .student-public-details {
            display: grid;
            gap: 12px;
            padding-top: 18px;
            border-top: 1px solid #edf1f6;
        }

        .student-public-detail {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }

        .student-public-detail i {
            margin-top: 3px;
            color: #2563eb;
        }

        @media (max-width: 767.98px) {
            .student-public-card {
                padding: 21px;
            }
        }
</style>

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

                Siswa Siswi

            </span>


            <h1>
                Siswa
                <br>
                Daftar Siswa
            </h1>


            <p>
                siswa siswi sma negeri 1 majalengka
                siap belajar siap suksess
            </p>


            <div class="public-breadcrumb">

                <a href="{{ route('landing') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Siswa
                </span>

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
                Infomasi Peserta Didik
            </div>

            <h2>
                Daftar Siswa
            </h2>

             <p>
                    Kenali peserta didik yang menjadi bagian dari
                    lingkungan belajar {{ $profil->nama_sekolah ?? 'sekolah' }}.
            </p>

        </div>

         @if($siswa->total() > 0)

                <div class="student-count">
                    Menampilkan {{ $siswa->firstItem() }}–{{ $siswa->lastItem() }}
                    dari {{ $siswa->total() }} siswa
                </div>

                <div class="row g-4">

                    @foreach($siswa as $item)

                        <div class="col-md-6 col-xl-4">

                            <article class="student-public-card">

                                <div class="student-public-top">

                                    <div class="student-public-avatar
                                        {{ $item->jenis_kelamin === 'Perempuan' ? 'female' : '' }}">

                                        <i class="bi bi-person-fill"></i>

                                    </div>

                                    <div>
                                        <div class="student-public-type">
                                            PESERTA DIDIK
                                        </div>

                                        <h2 class="student-public-name">
                                            {{ $item->nama_siswa }}
                                        </h2>
                                    </div>

                                </div>

                                <div class="student-public-details">

                                    <div class="student-public-detail">
                                        <i class="bi bi-gender-ambiguous"></i>
                                        <span>
                                            {{ $item->jenis_kelamin }}
                                        </span>
                                    </div>

                                    <div class="student-public-detail">
                                        <i class="bi bi-calendar3"></i>
                                        <span>
                                            Tahun masuk: {{ $item->tahun_masuk }}
                                        </span>
                                    </div>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>
                <div class="student-pagination d-flex justify-content-center">

                    {{ $siswa->links('pagination::bootstrap-5') }}

                </div>

            @else

                <div class="student-empty">

                    <div class="student-empty-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <h2>Data Siswa Belum Tersedia</h2>

                    <p>
                        Data siswa akan ditampilkan setelah tersedia
                        di dalam sistem.
                    </p>

                </div>

            @endif


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
