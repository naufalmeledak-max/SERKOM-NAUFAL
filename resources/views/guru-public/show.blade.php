<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $guru->nama_guru }}
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
                    <i class="bi bi-person-badge-fill"></i>
                    Tenaga Pendidik
                </span>

                <h1>
                    {{ $guru->nama_guru }}
                </h1>

                <div class="detail-breadcrumb">

                    <a href="{{ route('landing') }}">
                        Beranda
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <a href="{{ route('guru.landing') }}">
                        Guru
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
                    <div class="col-lg-5">

                        @if($guru->foto)

                            <img
                                src="{{ asset('assets/images/guru/' . $guru->foto) }}"
                                alt="{{ $guru->nama_guru }}"
                                class="detail-teacher-image"
                            >

                        @else

                            <div class="detail-teacher-placeholder">

                                <i class="bi bi-person-fill"></i>

                            </div>

                        @endif

                    </div>


                    {{-- INFO --}}
                    <div class="col-lg-7">

                        <div class="detail-side-panel">

                            <span class="detail-side-label">
                                Profil Guru
                            </span>

                            <h2 class="detail-side-title">
                                {{ $guru->nama_guru }}
                            </h2>


                            <div class="detail-info-list">

                                <div class="detail-info-item">

                                    <i class="bi bi-book"></i>

                                    <div>

                                        <small>
                                            Mata Pelajaran
                                        </small>

                                        <strong>
                                            {{ $guru->mapel ?? '-' }}
                                        </strong>

                                    </div>

                                </div>


                                <div class="detail-info-item">

                                    <i class="bi bi-person-vcard"></i>

                                    <div>

                                        <small>
                                            NIP
                                        </small>

                                        <strong>
                                            {{ $guru->nip ?? '-' }}
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
                        Profil Tenaga Pendidik
                    </h3>

                    <p class="detail-description">
                        {{ $guru->nama_guru }}
                        merupakan tenaga pendidik pada mata pelajaran
                        {{ $guru->mapel ?? '-' }} di sekolah.
                    </p>

                </div>


                <a
                    href="{{ route('guru.landing') }}"
                    class="detail-back-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Guru
                </a>

            </article>

        </div>

    </section>

</main>

</body>
</html>
