@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Tambah Ekstrakulikuler
                    </h4>

                    <form action="{{ route('ekstrakulikuler.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label>Nama Ekstrakulikuler</label>

                            <input type="text"
                                   name="nama_eskul"
                                   class="form-control"
                                   placeholder="Contoh: Futsal"
                                   maxlength="50"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Pembina</label>

                            <input type="text"
                                   name="pembina"
                                   class="form-control"
                                   placeholder="Nama pembina"
                                   maxlength="50"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Jadwal Latihan</label>

                            <input type="text"
                                   name="jadwal_latihan"
                                   class="form-control"
                                   placeholder="Contoh: Senin, 15:00 - 17:00"
                                   maxlength="50"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>

                            <textarea name="deskripsi"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Masukkan deskripsi ekstrakulikuler"
                                      required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Gambar</label>

                            <input type="file"
                                   name="gambar"
                                   class="form-control"
                                   accept="image/*"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('ekstrakulikuler.index') }}"
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
