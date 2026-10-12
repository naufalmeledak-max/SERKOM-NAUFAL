@extends('layout.index')

@section('title', 'Profil Sekolah')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Profil Sekolah
    </h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                Profil Sekolah
            </li>
        </ol>
    </nav>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if($profil->count() > 0)

    @php
        $data = $profil->first();
    @endphp

    <!-- Informasi Sekolah -->
    <div class="row">

        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body text-center">

                    @if($data->logo)
                        <img src="{{ asset('assets/images/sekolah/' . $data->logo) }}"
                             alt="Logo Sekolah"
                             class="img-fluid mb-3"
                             style="max-height: 150px;">
                    @else
                        <div class="mb-3">
                            <i class="mdi mdi-school"
                               style="font-size: 100px;"></i>
                        </div>
                    @endif

                    <h4 class="card-title">
                        {{ $data->nama_sekolah }}
                    </h4>

                    <p class="text-muted">
                        NPSN: {{ $data->npsn }}
                    </p>

                    <a href="{{ route('profil-sekolah.edit', $data->id_profil) }}"
                       class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i>
                        Edit Profil
                    </a>

                </div>
            </div>
        </div>


        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">
                            Informasi Sekolah
                        </h4>

                        <a href="{{ route('profil-sekolah.edit', $data->id_profil) }}"
                           class="btn btn-warning btn-sm">
                            <i class="mdi mdi-pencil"></i>
                            Edit
                        </a>
                    </div>

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <strong>Nama Sekolah</strong>
                            <p class="text-muted mb-0">
                                {{ $data->nama_sekolah }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Kepala Sekolah</strong>
                            <p class="text-muted mb-0">
                                {{ $data->kepala_sekolah }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>NPSN</strong>
                            <p class="text-muted mb-0">
                                {{ $data->npsn }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Tahun Berdiri</strong>
                            <p class="text-muted mb-0">
                                {{ $data->tahun_berdiri }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Kontak</strong>
                            <p class="text-muted mb-0">
                                {{ $data->kontak }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>Alamat</strong>
                            <p class="text-muted mb-0">
                                {{ $data->alamat }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Foto Sekolah -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body p-0">

                    @if($data->foto)

                        <div style="
                            width: 100%;
                            height: 350px;
                            overflow: hidden;
                            border-radius: 5px;
                        ">

                            <img src="{{ asset('assets/images/sekolah/' . $data->foto) }}"
                                alt="Foto Sekolah"
                                style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    display: block;
                                ">

                        </div>

                    @else

                        <div class="text-center text-muted py-5">

                            <i class="mdi mdi-image-off"
                            style="font-size: 60px;"></i>

                            <p class="mt-2 mb-0">
                                Foto sekolah belum tersedia.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    <!-- Deskripsi -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Deskripsi Sekolah
                    </h4>

                    <p class="text-muted">
                        {{ $data->deskripsi }}
                    </p>

                </div>

            </div>
        </div>

    </div>


    <!-- Visi Misi -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Visi & Misi
                    </h4>

                    <p class="text-muted">
                        {{ $data->visi_misi }}
                    </p>

                </div>

            </div>
        </div>

    </div>


@else

    <!-- Jika belum ada data -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">

                <div class="card-body text-center">

                    <i class="mdi mdi-school-outline"
                       style="font-size: 80px;"></i>

                    <h4 class="mt-3">
                        Data Profil Sekolah Belum Tersedia
                    </h4>

                    <p class="text-muted">
                        Silakan tambahkan data profil sekolah melalui database terlebih dahulu.
                    </p>

                </div>

            </div>
        </div>

    </div>

@endif

@endsection
