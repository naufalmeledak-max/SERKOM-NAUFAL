@extends('layout.index')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Tambah Data Prestasi
                </h4>

                <p class="card-description">
                    Silakan isi data prestasi siswa
                </p>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('prestasi.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    {{-- Nama Prestasi --}}
                    <div class="form-group">
                        <label>Nama Prestasi</label>

                        <input type="text"
                               name="nama_prestasi"
                               class="form-control"
                               placeholder="Masukkan nama prestasi"
                               value="{{ old('nama_prestasi') }}"
                               required>
                    </div>

                    {{-- Nama Siswa --}}
                    <div class="form-group">
                        <label>Nama Siswa</label>

                        <input type="text"
                               name="nama_siswa"
                               class="form-control"
                               placeholder="Masukkan nama siswa"
                               value="{{ old('nama_siswa') }}"
                               required>
                    </div>

                    {{-- Tingkat --}}
                    <div class="form-group">
                        <label>Tingkat</label>

                        <input type="text"
                               name="tingkat"
                               class="form-control"
                               placeholder="Contoh: Kabupaten"
                               value="{{ old('tingkat') }}"
                               required>
                    </div>

                    {{-- Peringkat --}}
                    <div class="form-group">
                        <label>Peringkat</label>

                        <input type="text"
                               name="peringkat"
                               class="form-control"
                               placeholder="Contoh: Juara 1"
                               value="{{ old('peringkat') }}"
                               required>
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group">
                        <label>Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="5"
                                  placeholder="Masukkan keterangan prestasi"
                                  required>{{ old('keterangan') }}</textarea>
                    </div>

                    {{-- Foto --}}
                    <div class="form-group">
                        <label>Foto</label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*"
                               required>

                        <small class="text-muted">
                            Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                        </small>
                    </div>

                    {{-- Tahun Ajaran --}}
                    <div class="form-group">
                        <label>Tahun Ajaran</label>

                        <input type="text"
                               name="tahun_ajaran"
                               class="form-control"
                               placeholder="Contoh: 2025/2026"
                               value="{{ old('tahun_ajaran') }}"
                               required>
                    </div>

                    <button type="submit"
                            class="btn btn-primary">
                        <i class="mdi mdi-content-save"></i>
                        Simpan
                    </button>

                    <a href="{{ route('prestasi.index') }}"
                       class="btn btn-light">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
