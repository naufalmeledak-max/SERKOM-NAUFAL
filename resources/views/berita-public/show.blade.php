<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $berita->judul }}
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
                    <i class="bi bi-newspaper"></i>
                    Berita Sekolah
                </span>

                <h1>
                    {{ $berita->judul }}
                </h1>

                <div class="detail-breadcrumb">

                    <a href="{{ route('landing') }}">
                        Beranda
                    </a>

                    <i class="bi bi-chevron-right"></i>

                    <a href="{{ route('berita.landing') }}">
                        Berita
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

                {{-- FOTO --}}
                @if($berita->gambar)

                    <img
                        src="{{ asset('assets/images/berita/' . $berita->gambar) }}"
                        alt="{{ $berita->judul }}"
                        class="detail-news-image"
                    >

                @endif


                {{-- INFO --}}
                <div class="detail-news-meta">

                    <span>

                        <i class="bi bi-calendar3"></i>

                        {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}

                    </span>


                    <span>

                        <i class="bi bi-person"></i>

                        {{ $berita->user->name ?? 'Admin' }}

                    </span>


                    <span>

                        <i class="bi bi-check-circle-fill"></i>

                        {{ $berita->status }}

                    </span>

                </div>


                {{-- JUDUL --}}
                <div class="detail-description-box">

                    <h3>
                        {{ $berita->judul }}
                    </h3>

                    <div class="detail-news-content">

                        {!! nl2br(e($berita->isi ?? 'Belum ada isi berita.')) !!}

                    </div>

                </div>


                <a
                    href="{{ route('berita.landing') }}"
                    class="detail-back-button"
                >
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke Berita
                </a>

            </article>

        </div>

    </section>

</main>

</body>
</html>
