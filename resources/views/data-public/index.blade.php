<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil Data Diri - {{ config('app.name', 'Sistem Informasi Sekolah') }}</title>

    <meta
        name="description"
        content="Daftar guru dan tenaga pendidik sekolah"
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


     <link rel="stylesheet"
      href="{{ asset('assets/css/landing.css') }}">

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

/* ========================================
   SECTION DATA DIRI
======================================== */

.data-diri-section {
    padding: 75px 0 90px;
    background: #f7f9fc;
}

.data-diri-heading {
    max-width: 650px;
    margin: 0 auto 42px;
}

.data-diri-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 16px;
    margin-bottom: 15px;
    border-radius: 50px;
    background: #e7efff;
    color: #2457bd;
    font-size: 13px;
    font-weight: 700;
}

.data-diri-heading h2 {
    margin-bottom: 12px;
    color: #17233f;
    font-family: 'Poppins', sans-serif;
    font-size: clamp(27px, 4vw, 38px);
    font-weight: 800;
}

.data-diri-heading p {
    margin: 0;
    color: #687386;
    line-height: 1.8;
}

/* ========================================
   KARTU DATA DIRI
======================================== */

.data-diri-card {
    height: 100%;
    overflow: hidden;
    border: 1px solid #e9edf4;
    border-radius: 22px;
    background: #fff;
    box-shadow: 0 10px 35px rgba(30, 50, 90, 0.07);
    transition:
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

.data-diri-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(30, 50, 90, 0.13);
}

/* Foto profil */

.data-diri-photo {
    height: 260px;
    overflow: hidden;
    background: #e9eff9;
}

.data-diri-photo img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.data-diri-no-photo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: #8a9ab6;
    font-size: 85px;
}

/* ========================================
   INFORMASI PROFIL
======================================== */

.data-diri-content {
    padding: 25px;
}

.data-diri-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 12px;
    color: #2761c4;
    font-size: 12px;
    font-weight: 700;
}

.data-diri-content h3 {
    margin-bottom: 22px;
    color: #17233f;
    font-family: 'Poppins', sans-serif;
    font-size: 21px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.data-diri-info {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    padding: 14px 0;
    border-top: 1px solid #edf0f5;
}

.data-diri-info-icon {
    display: flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: #edf3ff;
    color: #2860c5;
    font-size: 18px;
}

.data-diri-info small {
    display: block;
    margin-bottom: 4px;
    color: #7a8497;
    font-size: 12px;
}

.data-diri-info p {
    margin: 0;
    color: #26344d;
    font-size: 14px;
    font-weight: 600;
    overflow-wrap: anywhere;
}

/* ========================================
   KONDISI DATA KOSONG
======================================== */

.data-diri-empty {
    padding: 55px 20px;
    border: 1px dashed #cbd5e5;
    border-radius: 20px;
    background: #fff;
}

.data-diri-empty > i {
    color: #8ca0c2;
    font-size: 55px;
}

.data-diri-empty h3 {
    margin: 16px 0 10px;
    color: #17233f;
    font-size: 21px;
    font-weight: 700;
}

.data-diri-empty p {
    margin-bottom: 0;
    color: #687386;
    line-height: 1.8;
}

/* ========================================
   RESPONSIVE HP DAN TABLET
======================================== */

@media (max-width: 767.98px) {
    .data-diri-section {
        padding: 55px 0 65px;
    }

    .data-diri-heading {
        margin-bottom: 30px;
    }

    .data-diri-photo {
        height: 240px;
    }

    .data-diri-content {
        padding: 22px;
    }
}

@media (max-width: 575.98px) {
    .data-diri-section {
        padding: 45px 0 55px;
    }

    .data-diri-photo {
        height: 230px;
    }

    .data-diri-content {
        padding: 20px;
    }

    .data-diri-content h3 {
        font-size: 19px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .data-diri-card {
        transition: none;
    }

    .data-diri-card:hover {
        transform: none;
    }
}

</style>

<body>


@include('partials.public-navbar')


<main>



<section class="public-page-hero">

    <div class="container">

        <div
            class="public-page-hero-content"
            data-aos="fade-up"
        >

            <span class="public-page-kicker">

                <i class="bi bi-people-fill"></i>

                Data Informasi

            </span>

            <h1>
                Data Diri
            </h1>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Obcaecati, modi nostrum? Aspernatur necessitatibus,
                exercitationem quod, dignissimos option
            </p>

            <div class="public-breadcrumb">

                <a href="{{ route('landing') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Data Diri
                </span>

            </div>

        </div>

    </div>

</section>



<section class="data-diri-section">
    <div class="container">

        <div class="data-diri-heading text-center" data-aos="fade-up">
            <span class="data-diri-label">
                <i class="bi bi-person-vcard-fill"></i>
                Profil Pribadi
            </span>

            <h2>Profil Data Diri</h2>

            <p>
                Informasi identitas diri yang tersimpan dalam
                Sistem Informasi Sekolah.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            @forelse($data as $item)

                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up">

                    <div class="data-diri-card">

                        <div class="data-diri-photo">
                            @if($item->foto)
                                <img
                                    src="{{ asset('assets/images/data/' . $item->foto) }}"
                                    alt="Foto {{ $item->nama_lengkap }}"
                                    loading="lazy"
                                >
                            @else
                                <div class="data-diri-no-photo">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                            @endif
                        </div>

                        <div class="data-diri-content">

                            <span class="data-diri-status">
                                <i class="bi bi-person-check-fill"></i>
                                Profil Pribadi
                            </span>

                            <h3>
                                {{ $item->nama_lengkap }}
                            </h3>

                            <div class="data-diri-info">

                                <div class="data-diri-info-icon">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>

                                <div>
                                    <small>Nama Lengkap</small>
                                    <p>{{ $item->nama_lengkap }}</p>
                                </div>

                            </div>

                            <div class="data-diri-info">

                                <div class="data-diri-info-icon">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </div>

                                <div>
                                    <small>Kelas</small>
                                    <p>{{ $item->kelas }}</p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12">
                    <div class="data-diri-empty text-center">

                        <i class="bi bi-person-vcard"></i>

                        <h3>Data Diri Belum Tersedia</h3>

                        <p>
                            Belum ada data diri yang ditambahkan.
                            Silakan tambahkan data melalui halaman admin.
                        </p>

                    </div>
                </div>

            @endforelse

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
