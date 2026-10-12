
@extends('layout.index')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-2">

                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-account-edit-outline mr-2"></i>
                        Edit Data Diri
                    </h4>

                    <a href="{{ route('data-admin.index') }}"
                       class="btn btn-light btn-sm">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                <p class="card-description mb-4">
                    Perbarui informasi data diri dan foto profil.
                </p>


                {{-- PESAN VALIDASI --}}
                @if($errors->any())

                    <div class="alert alert-danger alert-dismissible fade show"
                         role="alert">

                        <strong>
                            <i class="mdi mdi-alert-circle-outline"></i>
                            Data belum berhasil diperbarui.
                        </strong>

                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button"
                                class="close"
                                data-dismiss="alert"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>

                @endif


                {{-- FORM EDIT --}}
                <form action="{{ route('data-admin.update', $dataDiri->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    {{-- NAMA LENGKAP --}}
                    <div class="form-group">

                        <label for="nama_lengkap">
                            Nama Lengkap
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               id="nama_lengkap"
                               name="nama_lengkap"
                               class="form-control @error('nama_lengkap') is-invalid @enderror"
                               placeholder="Masukkan nama lengkap"
                               value="{{ old('nama_lengkap', $dataDiri->nama_lengkap) }}"
                               maxlength="50"
                               required>

                        @error('nama_lengkap')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- KELAS --}}
                    <div class="form-group">

                        <label for="kelas">
                            Kelas
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               id="kelas"
                               name="kelas"
                               class="form-control @error('kelas') is-invalid @enderror"
                               placeholder="Contoh: XII RPL 1"
                               value="{{ old('kelas', $dataDiri->kelas) }}"
                               maxlength="50"
                               required>

                        @error('kelas')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- FOTO LAMA --}}
                    <div class="form-group">

                        <label>Foto Saat Ini</label>

                        <div class="p-3 border rounded">

                            @if($dataDiri->foto &&
                                file_exists(public_path('assets/images/data/' . $dataDiri->foto)))

                                <img
                                    src="{{ asset('assets/images/data/' . $dataDiri->foto) }}"
                                    alt="Foto {{ $dataDiri->nama_lengkap }}"
                                    class="img-fluid rounded"
                                    style="max-width: 320px; max-height: 260px; object-fit: cover;">

                                <p class="text-muted mt-2 mb-0">
                                    <i class="mdi mdi-image-outline"></i>
                                    {{ $dataDiri->foto }}
                                </p>

                            @else

                                <div class="text-center text-muted py-4">

                                    <i class="mdi mdi-image-off-outline"
                                       style="font-size: 45px;"></i>

                                    <p class="mb-0">
                                        Foto belum tersedia.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- FOTO BARU --}}
                    <div class="form-group">

                        <label for="foto">
                            Ganti Foto
                        </label>

                        <input type="file"
                               id="foto"
                               name="foto"
                               class="form-control @error('foto') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <small class="form-text text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                        @error('foto')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror


                        {{-- PREVIEW FOTO BARU --}}
                        <div id="preview-container"
                             class="mt-3"
                             style="display: none;">

                            <p class="mb-2">
                                Pratinjau Foto Baru:
                            </p>

                            <img id="preview-foto"
                                 src=""
                                 alt="Pratinjau foto baru"
                                 class="img-fluid rounded"
                                 style="max-width: 320px; max-height: 260px; object-fit: cover;">

                        </div>

                    </div>


                    {{-- TOMBOL --}}
                    <div class="border-top pt-3 mt-4">

                        <button type="submit"
                                class="btn btn-primary mr-2">

                            <i class="mdi mdi-content-save"></i>
                            Update Data

                        </button>

                        <a href="{{ route('data-admin.index') }}"
                           class="btn btn-light">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- PREVIEW FOTO --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const inputFoto = document.getElementById('foto');
    const previewContainer = document.getElementById('preview-container');
    const previewFoto = document.getElementById('preview-foto');

    let previewUrl = null;

    inputFoto.addEventListener('change', function () {

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (!this.files || !this.files[0]) {
            previewContainer.style.display = 'none';
            previewFoto.src = '';
            return;
        }

        const file = this.files[0];

        const tipeDiizinkan = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!tipeDiizinkan.includes(file.type)) {
            this.value = '';
            previewContainer.style.display = 'none';

            alert('Pilih foto berformat JPG, JPEG, PNG, atau WEBP.');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            this.value = '';
            previewContainer.style.display = 'none';

            alert('Ukuran foto maksimal 2 MB.');
            return;
        }

        previewUrl = URL.createObjectURL(file);
        previewFoto.src = previewUrl;
        previewContainer.style.display = 'block';

    });

});
</script>

@endsection
