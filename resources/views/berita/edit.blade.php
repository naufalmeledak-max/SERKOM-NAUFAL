@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title">
            Edit Berita
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('berita.index') }}">Berita</a>
                </li>

                <li class="breadcrumb-item active">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">
                        Form Edit Berita
                    </h4>

                    <p class="card-description">
                        Ubah data berita.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan!</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('berita.update', $berita->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div class="form-group">
                            <label for="judul">
                                Judul Berita
                            </label>

                            <input type="text"
                                   class="form-control"
                                   id="judul"
                                   name="judul"
                                   value="{{ old('judul', $berita->judul) }}"
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
                                      required>{{ old('isi', $berita->isi) }}</textarea>
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
                                   value="{{ old('tanggal', $berita->tanggal) }}"
                                   required>
                        </div>

                        {{-- Gambar Lama --}}
                        <div class="form-group">

                            <label>
                                Gambar Saat Ini
                            </label>

                            <br>

                            @if ($berita->gambar)

                                <img src="{{ asset('assets/images/berita/' . $berita->gambar) }}"
                                     alt="{{ $berita->judul }}"
                                     style="
                                        width: 250px;
                                        height: 150px;
                                        object-fit: cover;
                                        border-radius: 5px;
                                     ">

                            @else

                                <p class="text-muted">
                                    Tidak ada gambar.
                                </p>

                            @endif

                        </div>

                        {{-- Gambar Baru --}}
                        <div class="form-group">

                            <label for="gambar">
                                Ganti Gambar
                            </label>

                            <input type="file"
                                   class="form-control"
                                   id="gambar"
                                   name="gambar"
                                   accept=".jpg,.jpeg,.png,.webp">

                            <small class="form-text text-muted">
                                Kosongkan jika tidak ingin mengganti gambar.
                                Maksimal 2 MB.
                            </small>

                        </div>

                        {{-- Preview gambar baru --}}
                        <div class="form-group">

                            <img id="preview-gambar"
                                 src="#"
                                 alt="Preview"
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

                                <option value="Publish"
                                    {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>
                                    Publish
                                </option>

                                <option value="Draft"
                                    {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-primary mr-2">

                            <i class="mdi mdi-content-save"></i>
                            Simpan Perubahan

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
