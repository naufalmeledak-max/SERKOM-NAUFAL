@extends('layout.index')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Edit Data Prestasi
                </h4>

                <p class="card-description">
                    Ubah data prestasi siswa
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

                <form action="{{ route('prestasi.update', $prestasi->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Nama Prestasi --}}
                    <div class="form-group">
                        <label>Nama Prestasi</label>

                        <input type="text"
                               name="nama_prestasi"
                               class="form-control"
                               value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}"
                               required>
                    </div>

                    {{-- Nama Siswa --}}
                    <div class="form-group">
                        <label>Nama Siswa</label>

                        <input type="text"
                               name="nama_siswa"
                               class="form-control"
                               value="{{ old('nama_siswa', $prestasi->nama_siswa) }}"
                               required>
                    </div>

                    {{-- Tingkat --}}
                    <div class="form-group">
                        <label>Tingkat</label>

                        <input type="text"
                               name="tingkat"
                               class="form-control"
                               value="{{ old('tingkat', $prestasi->tingkat) }}"
                               required>
                    </div>

                    {{-- Peringkat --}}
                    <div class="form-group">
                        <label>Peringkat</label>

                        <input type="text"
                               name="peringkat"
                               class="form-control"
                               value="{{ old('peringkat', $prestasi->peringkat) }}"
                               required>
                    </div>

                    {{-- Keterangan --}}
                    <div class="form-group">
                        <label>Keterangan</label>

                        <textarea name="keterangan"
                                  class="form-control"
                                  rows="5"
                                  required>{{ old('keterangan', $prestasi->keterangan) }}</textarea>
                    </div>

                    {{-- Foto Lama --}}
                    <div class="form-group">

                        <label>Foto Saat Ini</label>

                        <br>

                        @if($prestasi->foto)

                            <img src="{{ asset('assets/images/prestasi/' . $prestasi->foto) }}"
                                 width="150"
                                 style="border-radius: 5px;">

                        @else

                            <p class="text-muted">
                                Tidak ada foto
                            </p>

                        @endif

                    </div>

                    {{-- Foto Baru --}}
                    <div class="form-group">

                        <label>Ganti Foto</label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                    </div>

                    {{-- Tahun Ajaran --}}
                    <div class="form-group">

                        <label>Tahun Ajaran</label>

                        <input type="text"
                               name="tahun_ajaran"
                               class="form-control"
                               value="{{ old('tahun_ajaran', $prestasi->tahun_ajaran) }}"
                               required>

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="mdi mdi-content-save"></i>
                        Update

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
