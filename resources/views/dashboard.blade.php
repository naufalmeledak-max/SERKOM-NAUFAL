@extends('layout.index')

@section('content')

<div class="row">
    <div class="col-12 grid-margin">

        <div class="card">
            <div class="card-body">

                <h3 class="font-weight-bold mb-2">
                    Selamat Datang
                    <span class="text-primary">
                        {{ Auth::user()->name }}
                    </span>
                    di Sistem Informasi Sekolah 👋
                </h3>

                <p class="text-muted mb-0">
                    Kelola dan pantau data sekolah melalui dashboard.
                </p>

            </div>
        </div>

    </div>
</div>


{{-- ========================================================= --}}
{{-- CARD STATISTIK --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- GURU --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">

        <div class="card w-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            DATA GURU
                        </p>

                        <h2 class="font-weight-bold mb-0">
                            {{ $jumlahGuru }}
                        </h2>

                        <small class="text-muted">
                            Guru
                        </small>

                    </div>

                    <i class="mdi mdi-account-tie"
                       style="font-size:45px;">
                    </i>

                </div>

                <div class="mt-3">

                    <a href="{{ route('guru.index') }}"
                       class="text-decoration-none">

                        Lihat Data →

                    </a>

                </div>

            </div>
        </div>

    </div>


    {{-- SISWA --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">

        <div class="card w-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            DATA SISWA
                        </p>

                        <h2 class="font-weight-bold mb-0">
                            {{ $jumlahSiswa }}
                        </h2>

                        <small class="text-muted">
                            Siswa
                        </small>

                    </div>

                    <i class="mdi mdi-account-multiple"
                       style="font-size:45px;">
                    </i>

                </div>

                <div class="mt-3">

                    <a href="{{ route('siswa.index') }}"
                       class="text-decoration-none">

                        Lihat Data →

                    </a>

                </div>

            </div>
        </div>

    </div>


    {{-- PRESTASI --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">

        <div class="card w-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            PRESTASI
                        </p>

                        <h2 class="font-weight-bold mb-0">
                            {{ $jumlahPrestasi }}
                        </h2>

                        <small class="text-muted">
                            Prestasi
                        </small>

                    </div>

                    <i class="mdi mdi-trophy"
                       style="font-size:45px;">
                    </i>

                </div>

                <div class="mt-3">

                    <a href="{{ route('prestasi.index') }}"
                       class="text-decoration-none">

                        Lihat Data →

                    </a>

                </div>

            </div>
        </div>

    </div>


    {{-- EKSTRAKULIKULER --}}
    <div class="col-md-6 col-xl-3 grid-margin stretch-card">

        <div class="card w-100">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-1">
                            EKSTRAKULIKULER
                        </p>

                        <h2 class="font-weight-bold mb-0">
                            {{ $jumlahEkstrakulikuler }}
                        </h2>

                        <small class="text-muted">
                            Kegiatan
                        </small>

                    </div>

                    <i class="mdi mdi-run"
                       style="font-size:45px;">
                    </i>

                </div>

                <div class="mt-3">

                    <a href="{{ route('ekstrakulikuler.index') }}"
                       class="text-decoration-none">

                        Lihat Data →

                    </a>

                </div>

            </div>
        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- PRESTASI & GALERI --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- ===================================================== --}}
    {{-- PRESTASI TERBARU --}}
    {{-- ===================================================== --}}

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card w-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="card-title mb-1">
                            🏆 Prestasi Terbaru
                        </h4>

                        <small class="text-muted">
                            3 prestasi terakhir
                        </small>
                    </div>

                    <a href="{{ route('prestasi.index') }}"
                       class="btn btn-sm btn-primary">

                        Lihat Semua

                    </a>

                </div>


                @forelse($prestasiTerbaru as $data)

                    <div class="d-flex align-items-center mb-3 pb-3"
                         style="border-bottom:1px solid rgba(128,128,128,.15);">

                        {{-- FOTO --}}
                        <div class="mr-3">

                            @if($data->foto)

                                <img src="{{ asset('assets/images/prestasi/' . $data->foto) }}"
                                     width="60"
                                     height="60"
                                     style="
                                        object-fit:cover;
                                        border-radius:10px;
                                     "
                                     alt="Prestasi">

                            @else

                                <div style="
                                    width:60px;
                                    height:60px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    background:rgba(128,128,128,.12);
                                    border-radius:10px;
                                ">

                                    <i class="mdi mdi-trophy"
                                       style="font-size:28px;">
                                    </i>

                                </div>

                            @endif

                        </div>


                        {{-- INFORMASI --}}
                        <div class="flex-grow-1">

                            <h6 class="mb-1 font-weight-bold">

                                {{ $data->nama_prestasi }}

                            </h6>

                            <p class="text-muted mb-1">

                                {{ $data->nama_siswa }}

                            </p>

                            <small class="text-muted">

                                {{ $data->tingkat }}

                                <span class="mx-1">•</span>

                                {{ $data->peringkat }}

                            </small>

                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted py-4">

                        <i class="mdi mdi-trophy-outline"
                           style="font-size:45px;">
                        </i>

                        <p class="mt-2 mb-0">
                            Belum ada data prestasi.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- GALERI TERBARU --}}
    {{-- ===================================================== --}}

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card w-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="card-title mb-1">
                            🖼️ Galeri Terbaru
                        </h4>

                        <small class="text-muted">
                            3 galeri terakhir
                        </small>
                    </div>

                    <a href="{{ route('galeri.index') }}"
                       class="btn btn-sm btn-primary">

                        Lihat Semua

                    </a>

                </div>


                <div class="row">

                    @forelse($galeriTerbaru as $data)

                        <div class="col-6 col-md-4 mb-3">

                            @if($data->kategori == 'Foto')

                                <img src="{{ asset('assets/images/galeri/' . $data->file) }}"
                                     class="img-fluid"
                                     style="
                                        width:100%;
                                        height:105px;
                                        object-fit:cover;
                                        border-radius:10px;
                                     "
                                     alt="{{ $data->judul }}">

                            @else

                                <div style="
                                    height:105px;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    background:rgba(128,128,128,.12);
                                    border-radius:10px;
                                ">

                                    <i class="mdi mdi-video"
                                       style="font-size:40px;">
                                    </i>

                                </div>

                            @endif

                            <p class="mt-2 mb-0 small font-weight-bold">

                                {{ $data->judul }}

                            </p>

                        </div>

                    @empty

                        <div class="col-12">

                            <div class="text-center text-muted py-4">

                                <i class="mdi mdi-image-off-outline"
                                   style="font-size:45px;">
                                </i>

                                <p class="mt-2 mb-0">
                                    Belum ada data galeri.
                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- BERITA & PENGUMUMAN --}}
{{-- ========================================================= --}}

<div class="row">

    {{-- ===================================================== --}}
    {{-- BERITA TERBARU --}}
    {{-- ===================================================== --}}

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card w-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="card-title mb-1">
                            📰 Berita Terbaru
                        </h4>

                        <small class="text-muted">
                            3 berita terakhir
                        </small>
                    </div>

                    <a href="{{ route('berita.index') }}"
                       class="btn btn-sm btn-primary">

                        Lihat Semua

                    </a>

                </div>


                @forelse($beritaTerbaru as $data)

                    <div class="mb-3 pb-3"
                         style="
                            border-bottom:1px solid rgba(128,128,128,.15);
                         ">

                        <h6 class="mb-1 font-weight-bold">

                            {{ $data->judul }}

                        </h6>


                        <p class="text-muted mb-2">

                            {{ \Illuminate\Support\Str::limit($data->isi, 100) }}

                        </p>


                        <div class="d-flex justify-content-between align-items-center">

                            <small class="text-muted">

                                <i class="mdi mdi-calendar"></i>

                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}

                            </small>


                            @if($data->status == 'Publish')

                                <span class="badge badge-success">
                                    Publish
                                </span>

                            @else

                                <span class="badge badge-warning">
                                    Draft
                                </span>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted py-4">

                        <i class="mdi mdi-newspaper-variant-outline"
                           style="font-size:45px;">
                        </i>

                        <p class="mt-2 mb-0">
                            Belum ada berita.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- ===================================================== --}}
    {{-- PENGUMUMAN TERBARU --}}
    {{-- ===================================================== --}}

    <div class="col-lg-6 grid-margin stretch-card">

        <div class="card w-100">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <div>
                        <h4 class="card-title mb-1">
                            📢 Pengumuman Terbaru
                        </h4>

                        <small class="text-muted">
                            3 pengumuman terakhir
                        </small>
                    </div>

                    <a href="{{ route('pengumuman.index') }}"
                       class="btn btn-sm btn-primary">

                        Lihat Semua

                    </a>

                </div>


                @forelse($pengumumanTerbaru as $data)

                    <div class="mb-3 pb-3"
                         style="
                            border-bottom:1px solid rgba(128,128,128,.15);
                         ">

                        <h6 class="mb-1 font-weight-bold">

                            {{ $data->judul }}

                        </h6>


                        <p class="text-muted mb-2">

                            {{ \Illuminate\Support\Str::limit($data->isi, 100) }}

                        </p>


                        <div class="d-flex justify-content-between align-items-center">

                            <small class="text-muted">

                                <i class="mdi mdi-calendar"></i>

                                {{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}

                            </small>


                            @if($data->status == 'Publish')

                                <span class="badge badge-success">
                                    Publish
                                </span>

                            @else

                                <span class="badge badge-warning">
                                    Draft
                                </span>

                            @endif

                        </div>

                    </div>

                @empty

                    <div class="text-center text-muted py-4">

                        <i class="mdi mdi-bullhorn-outline"
                           style="font-size:45px;">
                        </i>

                        <p class="mt-2 mb-0">
                            Belum ada pengumuman.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- AKSES CEPAT --}}
{{-- ========================================================= --}}

<div class="row">

    <div class="col-12 grid-margin">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Akses Cepat
                </h4>


                <div class="row">

                    {{-- Tambah Guru --}}
                    <div class="col-md-3 col-6 mb-3">

                        <a href="{{ route('guru.create') }}"
                           class="btn btn-outline-primary btn-block">

                            <i class="mdi mdi-account-plus"></i>

                            Tambah Guru

                        </a>

                    </div>


                    {{-- Tambah Siswa --}}
                    <div class="col-md-3 col-6 mb-3">

                        <a href="{{ route('siswa.create') }}"
                           class="btn btn-outline-primary btn-block">

                            <i class="mdi mdi-account-plus"></i>

                            Tambah Siswa

                        </a>

                    </div>


                    {{-- Tambah Prestasi --}}
                    <div class="col-md-3 col-6 mb-3">

                        <a href="{{ route('prestasi.create') }}"
                           class="btn btn-outline-primary btn-block">

                            <i class="mdi mdi-trophy"></i>

                            Tambah Prestasi

                        </a>

                    </div>


                    {{-- Tambah Galeri --}}
                    <div class="col-md-3 col-6 mb-3">

                        <a href="{{ route('galeri.create') }}"
                           class="btn btn-outline-primary btn-block">

                            <i class="mdi mdi-image-plus"></i>

                            Tambah Galeri

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
