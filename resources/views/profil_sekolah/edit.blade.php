@extends('layout.index')

@section('title', 'Edit Profil Sekolah')

@section('content')

<div class="page-header">
    <h3 class="page-title">
        Edit Profil Sekolah
    </h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('profil-sekolah.index') }}">
                    Profil Sekolah
                </a>
            </li>
            <li class="breadcrumb-item active">
                Edit
            </li>
        </ol>
    </nav>
</div>


@if($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan!</strong>

        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('profil-sekolah.update', $profil->id_profil) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')


    <!-- INFORMASI SEKOLAH -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Informasi Sekolah
                    </h4>

                    <p class="card-description">
                        Ubah informasi dasar sekolah
                    </p>


                    <div class="row">

                        <!-- Nama Sekolah -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="nama_sekolah">
                                    Nama Sekolah
                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="nama_sekolah"
                                       name="nama_sekolah"
                                       value="{{ old('nama_sekolah', $profil->nama_sekolah) }}"
                                       placeholder="Masukkan nama sekolah">

                            </div>
                        </div>


                        <!-- Kepala Sekolah -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="kepala_sekolah">
                                    Kepala Sekolah
                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="kepala_sekolah"
                                       name="kepala_sekolah"
                                       value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}"
                                       placeholder="Masukkan nama kepala sekolah">

                            </div>
                        </div>


                        <!-- NPSN -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="npsn">
                                    NPSN
                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="npsn"
                                       name="npsn"
                                       value="{{ old('npsn', $profil->npsn) }}"
                                       placeholder="Masukkan NPSN">

                            </div>
                        </div>


                        <!-- Tahun Berdiri -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="tahun_berdiri">
                                    Tahun Berdiri
                                </label>

                                <input type="number"
                                       class="form-control"
                                       id="tahun_berdiri"
                                       name="tahun_berdiri"
                                       value="{{ old('tahun_berdiri', $profil->tahun_berdiri) }}"
                                       placeholder="Contoh: 2005">

                            </div>
                        </div>


                        <!-- Kontak -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="kontak">
                                    Kontak
                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="kontak"
                                       name="kontak"
                                       value="{{ old('kontak', $profil->kontak) }}"
                                       placeholder="Masukkan nomor kontak">

                            </div>
                        </div>


                        <!-- Alamat -->
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="alamat">
                                    Alamat
                                </label>

                                <textarea class="form-control"
                                          id="alamat"
                                          name="alamat"
                                          rows="3"
                                          placeholder="Masukkan alamat sekolah">{{ old('alamat', $profil->alamat) }}</textarea>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- LOGO DAN FOTO -->
    <div class="row">

        <!-- Logo -->
        <div class="col-md-6 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Logo Sekolah
                    </h4>

                    <p class="card-description">
                        Masukkan nama file logo sekolah
                    </p>

                    <div class="form-group">

                        <label for="logo">
                            Logo
                        </label>

                        <input type="file"
                                class="form-control"
                                id="logo"
                                name="logo"
                                accept="image/*">
                    </div>

                    @if($profil->logo)

                        <div class="text-center mt-3">

                            <img src="{{ asset('assets/images/' . $profil->logo) }}"
                                 alt="Logo Sekolah"
                                 class="img-fluid"
                                 style="max-height: 150px;">

                        </div>

                    @endif

                </div>

            </div>

        </div>


        <!-- Foto -->
        <div class="col-md-6 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Foto Sekolah
                    </h4>

                    <p class="card-description">
                        Masukkan nama file foto sekolah
                    </p>

                    <div class="form-group">

                        <label for="foto">
                            Foto
                        </label>

                        <input type="file"
                                class="form-control"
                                id="foto"
                                name="foto"
                                accept="image/*">
                    </div>

                   @if($profil->foto)

                        <div class="text-center mt-3">

                            <img src="{{ asset('assets/images/sekolah/' . $profil->foto) }}"
                                alt="Foto Sekolah"
                                class="img-fluid"
                                style="max-height: 200px;">

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    <!-- DESKRIPSI -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Deskripsi Sekolah
                    </h4>

                    <p class="card-description">
                        Deskripsi mengenai sekolah
                    </p>

                    <div class="form-group">

                        <label for="deskripsi">
                            Deskripsi
                        </label>

                        <textarea class="form-control"
                                  id="deskripsi"
                                  name="deskripsi"
                                  rows="6"
                                  placeholder="Masukkan deskripsi sekolah">{{ old('deskripsi', $profil->deskripsi) }}</textarea>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- VISI & MISI -->
    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Visi & Misi
                    </h4>

                    <p class="card-description">
                        Masukkan visi dan misi sekolah
                    </p>

                    <div class="form-group">

                        <label for="visi_misi">
                            Visi & Misi
                        </label>

                        <textarea class="form-control"
                                  id="visi_misi"
                                  name="visi_misi"
                                  rows="8"
                                  placeholder="Masukkan visi dan misi sekolah">{{ old('visi_misi', $profil->visi_misi) }}</textarea>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOMBOL -->
    <div class="row">

        <div class="col-md-12 grid-margin">

            <div class="card">

                <div class="card-body">

                    <a href="{{ route('profil-sekolah.index') }}"
                       class="btn btn-light">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="mdi mdi-content-save"></i>
                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>

@endsection
