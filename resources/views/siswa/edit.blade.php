@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Edit Data Siswa
                    </h4>

                    <form action="{{ route('siswa.update', $siswa->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>NISN</label>

                            <input type="text"
                                   name="nisn"
                                   class="form-control"
                                   value="{{ $siswa->nisn }}"
                                   maxlength="10"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Nama Siswa</label>

                            <input type="text"
                                   name="nama_siswa"
                                   class="form-control"
                                   value="{{ $siswa->nama_siswa }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>

                            <select name="jenis_kelamin"
                                    class="form-control"
                                    required>

                                <option value="Laki-laki"
                                    {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki
                                </option>

                                <option value="Perempuan"
                                    {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tahun Masuk</label>

                            <input type="number"
                                   name="tahun_masuk"
                                   class="form-control"
                                   value="{{ $siswa->tahun_masuk }}"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan Perubahan
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
