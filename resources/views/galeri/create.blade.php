@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Tambah Galeri
                    </h4>

                    <p class="card-description">
                        Form tambah data galeri
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

                    <form action="{{ route('galeri.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">

                            <label>
                                Judul
                            </label>

                            <input type="text"
                                   name="judul"
                                   class="form-control"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul galeri"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>
                                Keterangan
                            </label>

                            <textarea name="keterangan"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Masukkan keterangan"
                                      required>{{ old('keterangan') }}</textarea>

                        </div>

                        <div class="form-group">

                            <label>
                                Kategori
                            </label>

                            <select name="kategori"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Kategori --
                                </option>

                                <option value="Foto"
                                    {{ old('kategori') == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori') == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>
                                Tanggal
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   value="{{ old('tanggal') }}"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>
                                File
                            </label>

                            <input type="file"
                                   name="file"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi"
                                   required>

                            <small class="form-text text-muted">
                                Foto: JPG, JPEG, PNG, WEBP.
                                Video: MP4, MOV, AVI.
                                Maksimal 20 MB.
                            </small>

                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Simpan
                        </button>

                        <a href="{{ route('galeri.index') }}"
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
