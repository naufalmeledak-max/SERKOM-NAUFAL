@extends('layout.index')

@section('content')

<div class="content-wrapper">

    {{-- Page Header --}}
    <div class="page-header">
        <h3 class="page-title">
            Tambah Berita
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('berita.index') }}">Berita</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Tambah
                </li>
            </ol>
        </nav>
    </div>


    {{-- Card Form --}}
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Form Tambah Berita
                    </h4>

                    <p class="card-description">
                        Silakan isi data berita di bawah ini.
                    </p>


                    {{-- Menampilkan Error --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>
                                Terjadi kesalahan!
                            </strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- Form --}}
                    <form action="{{ route('berita.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf


                        {{-- Judul --}}
                        <div class="form-group">

                            <label for="judul">
                                Judul Berita
                            </label>

                            <input type="text"
                                   class="form-control"
                                   id="judul"
                                   name="judul"
                                   value="{{ old('judul') }}"
                                   placeholder="Masukkan judul berita"
                                   maxlength="50"
                                   required>

                        </div>


                        {{-- Isi --}}
                        <div class="form-group">

                            <label for="isi">
                                Isi Berita
                            </label>

                            <textarea class="form-control"
                                      id="isi"
                                      name="isi"
                                      rows="8"
                                      placeholder="Masukkan isi berita"
                                      required>{{ old('isi') }}</textarea>

                        </div>


                        {{-- Tanggal --}}
                        <div class="form-group">

                            <label for="tanggal">
                                Tanggal
                            </label>

                            <input type="date"
                                   class="form-control"
                                   id="tanggal"
                                   name="tanggal"
                                   value="{{ old('tanggal', date('Y-m-d')) }}"
                                   required>

                        </div>


                        {{-- Gambar --}}
                        <div class="form-group">

                            <label for="gambar">
                                Gambar Berita
                            </label>

                            <input type="file"
                                   class="form-control"
                                   id="gambar"
                                   name="gambar"
                                   accept=".jpg,.jpeg,.png,.webp"
                                   required>

                            <small class="form-text text-muted">
                                Format: JPG, JPEG, PNG, WEBP. Maksimal 2 MB.
                            </small>

                        </div>


                        {{-- Preview Gambar --}}
                        <div class="form-group">

                            <img id="preview-gambar"
                                 src="#"
                                 alt="Preview Gambar"
                                 style="
                                    display: none;
                                    width: 250px;
                                    height: 150px;
                                    object-fit: cover;
                                    border-radius: 5px;
                                 ">

                        </div>


                        {{-- Status --}}
                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select class="form-control"
                                    id="status"
                                    name="status"
                                    required>

                                <option value="">
                                    -- Pilih Status --
                                </option>

                                <option value="Publish"
                                    {{ old('status') == 'Publish' ? 'selected' : '' }}>
                                    Publish
                                </option>

                                <option value="Draft"
                                    {{ old('status') == 'Draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                            </select>

                        </div>


                        {{-- Tombol --}}
                        <button type="submit"
                                class="btn btn-primary mr-2">

                            <i class="mdi mdi-content-save"></i>

                            Simpan

                        </button>


                        <a href="{{ route('berita.index') }}"
                           class="btn btn-light">

                            <i class="mdi mdi-arrow-left"></i>

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>


{{-- Preview Gambar --}}
<script>

    document.getElementById('gambar').addEventListener('change', function(event) {

        const file = event.target.files[0];

        const preview = document.getElementById('preview-gambar');

        if (file) {

            preview.src = URL.createObjectURL(file);

            preview.style.display = 'block';

        } else {

            preview.src = '#';

            preview.style.display = 'none';

        }

    });

</script>

@endsection
