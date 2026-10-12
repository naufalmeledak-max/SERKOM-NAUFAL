<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $ekstrakulikuler->nama_eskul }}
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

<body class="detail-page">

@include('partials.public-navbar')

<main>

    {{-- HERO --}}
    <section class="detail-hero">

        <div class="container">

            <div class="detail-hero-content">

                <span class="detail-badge">
                    <i class="bi bi-people-fill"></i>
                    Ekstrakulikuler Sekolah
                </span>

                <h1>
                    {{ $ekstrakulikuler->nama_eskul }}
                </h1>

                <div class="detail-breadcrumb">

                    <a href="{{ route('landing') }}">
                        Beranda
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <a href="{{ route('ekstrakulikuler.landing') }}">
                        Ekstrakulikuler
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <span>
                        Detail
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- CONTENT --}}
    <section class="detail-section">

        <div class="container">

            <article class="detail-content-card">

                <div class="row g-5 align-items-stretch">

                    {{-- FOTO --}}
                    <div class="col-lg-7">

                        @if($ekstrakulikuler->gambar)

                            <img
                                src="{{ asset('assets/images/ekstrakulikuler/' . $ekstrakulikuler->gambar) }}"
                                alt="{{ $ekstrakulikuler->nama_eskul }}"
                                class="detail-main-image"
                            >

                        @else

                            <div class="detail-image-placeholder">

                                <i class="bi bi-people-fill"></i>

                            </div>

                        @endif

                    </div>


                    {{-- INFO --}}
                    <div class="col-lg-5">

                        <div class="detail-side-panel">

                            <span class="detail-side-label">
                                Kegiatan Siswa
                            </span>

                            <h2 class="detail-side-title">
                                {{ $ekstrakulikuler->nama_eskul }}
                            </h2>


                            <div class="detail-info-list">

                                <div class="detail-info-item">

                                    <i class="bi bi-person-badge"></i>

                                    <div>

                                        <small>
                                            Pembina
                                        </small>

                                        <strong>
                                            {{ $ekstrakulikuler->pembina ?? '-' }}
                                        </strong>

                                    </div>

                                </div>


                                <div class="detail-info-item">

                                    <i class="bi bi-calendar-event"></i>

                                    <div>

                                        <small>
                                            Jadwal Latihan
                                        </small>

                                        <strong>
                                            {{ $ekstrakulikuler->jadwal_latihan ?? '-' }}
                                        </strong>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- DESKRIPSI --}}
                <div class="detail-description-box">

                    <h3>
                        Tentang Ekstrakulikuler
                    </h3>

                    <p class="detail-description">
                        {{ $ekstrakulikuler->deskripsi ?? 'Informasi kegiatan belum tersedia.' }}
                    </p>

                </div>


                <a
                    href="{{ route('ekstrakulikuler.landing') }}"
                    class="detail-back-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Ekstrakulikuler
                </a>

            </article>

        </div>

    </section>

</main>

</body>
</html>
