@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Tambah Data Siswa
                    </h4>

                    <form action="{{ route('siswa.store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label>NISN</label>

                            <input type="text"
                                   name="nisn"
                                   class="form-control"
                                   placeholder="Masukkan NISN"
                                   maxlength="10"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Siswa</label>

                            <input type="text"
                                   name="nama_siswa"
                                   class="form-control"
                                   placeholder="Masukkan nama siswa"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Jenis Kelamin --
                                </option>

                                <option value="Laki-laki">
                                    Laki-laki
                                </option>

                                <option value="Perempuan">
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tahun Masuk</label>

                            <input type="number"
                                   name="tahun_masuk"
                                   class="form-control"
                                   placeholder="Contoh: 2026"
                                   min="1900"
                                   max="2100"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('siswa.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
