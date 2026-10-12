
@extends('layout.index')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                {{-- HEADER --}}
                <div class="d-flex justify-content-between align-items-center mb-2">

                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-pencil-box-outline mr-2"></i>
                        Edit Data Ekstrakulikuler
                    </h4>

                    <a href="{{ route('ekstrakulikuler.index') }}"
                       class="btn btn-light btn-sm">

                        <i class="mdi mdi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                <p class="card-description mb-4">
                    Perbarui informasi kegiatan ekstrakulikuler sekolah.
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
                <form action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    {{-- NAMA EKSTRAKULIKULER --}}
                    <div class="form-group">

                        <label for="nama_eskul">
                            Nama Ekstrakulikuler
                            <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               id="nama_eskul"
                               name="nama_eskul"
                               class="form-control @error('nama_eskul') is-invalid @enderror"
                               placeholder="Contoh: Futsal, Pramuka, Programming Club"
                               value="{{ old('nama_eskul', $ekstrakulikuler->nama_eskul) }}"
                               maxlength="50"
                               required>

                        @error('nama_eskul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    <div class="row">

                        {{-- PEMBINA --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="pembina">
                                    Nama Pembina
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       id="pembina"
                                       name="pembina"
                                       class="form-control @error('pembina') is-invalid @enderror"
                                       placeholder="Masukkan nama pembina"
                                       value="{{ old('pembina', $ekstrakulikuler->pembina) }}"
                                       maxlength="50"
                                       required>

                                @error('pembina')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>


                        {{-- JADWAL --}}
                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="jadwal_latihan">
                                    Jadwal Latihan
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text"
                                       id="jadwal_latihan"
                                       name="jadwal_latihan"
                                       class="form-control @error('jadwal_latihan') is-invalid @enderror"
                                       placeholder="Contoh: Jumat, 15.30–17.00"
                                       value="{{ old('jadwal_latihan', $ekstrakulikuler->jadwal_latihan) }}"
                                       maxlength="50"
                                       required>

                                @error('jadwal_latihan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- DESKRIPSI --}}
                    <div class="form-group">

                        <label for="deskripsi">
                            Deskripsi Kegiatan
                            <span class="text-danger">*</span>
                        </label>

                        <textarea id="deskripsi"
                                  name="deskripsi"
                                  class="form-control @error('deskripsi') is-invalid @enderror"
                                  rows="5"
                                  placeholder="Jelaskan tujuan dan kegiatan ekstrakulikuler..."
                                  required>{{ old('deskripsi', $ekstrakulikuler->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- GAMBAR LAMA --}}
                    <div class="form-group">

                        <label>
                            Gambar Saat Ini
                        </label>

                        <div class="p-3 border rounded">

                            @if($ekstrakulikuler->gambar &&
                                file_exists(public_path('assets/images/ekstrakulikuler/' . $ekstrakulikuler->gambar)))

                                <img src="{{ asset('assets/images/ekstrakulikuler/' . $ekstrakulikuler->gambar) }}"
                                     alt="Gambar {{ $ekstrakulikuler->nama_eskul }}"
                                     class="img-fluid rounded"
                                     style="max-width: 320px; max-height: 220px; object-fit: cover;">

                                <p class="text-muted mt-2 mb-0">
                                    <i class="mdi mdi-image-outline"></i>
                                    {{ $ekstrakulikuler->gambar }}
                                </p>

                            @else

                                <div class="text-center text-muted py-4">

                                    <i class="mdi mdi-image-off-outline"
                                       style="font-size: 45px;"></i>

                                    <p class="mb-0">
                                        Gambar belum tersedia.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>


                    {{-- GAMBAR BARU --}}
                    <div class="form-group">

                        <label for="gambar">
                            Ganti Gambar
                        </label>

                        <input type="file"
                               id="gambar"
                               name="gambar"
                               class="form-control @error('gambar') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">

                        <small class="form-text text-muted">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>

                        @error('gambar')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- PREVIEW GAMBAR BARU --}}
                        <div id="preview-container"
                             class="mt-3"
                             style="display: none;">

                            <p class="mb-2">
                                Pratinjau Gambar Baru:
                            </p>

                            <img id="preview-gambar"
                                 src=""
                                 alt="Pratinjau gambar baru"
                                 class="img-fluid rounded"
                                 style="max-width: 320px; max-height: 220px; object-fit: cover;">

                        </div>

                    </div>


                    {{-- TOMBOL --}}
                    <div class="border-top pt-3 mt-4">

                        <button type="submit"
                                class="btn btn-primary mr-2">

                            <i class="mdi mdi-content-save"></i>
                            Update Data

                        </button>

                        <a href="{{ route('ekstrakulikuler.index') }}"
                           class="btn btn-light">

                            Batal

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


{{-- PREVIEW GAMBAR --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const inputGambar = document.getElementById('gambar');
    const previewContainer = document.getElementById('preview-container');
    const previewGambar = document.getElementById('preview-gambar');

    let previewUrl = null;

    inputGambar.addEventListener('change', function () {

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }

        if (!this.files || !this.files[0]) {
            previewContainer.style.display = 'none';
            previewGambar.src = '';
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
            alert('Pilih gambar berformat JPG, JPEG, PNG, atau WEBP.');
            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            this.value = '';
            previewContainer.style.display = 'none';
            alert('Ukuran gambar maksimal 2 MB.');
            return;
        }

        previewUrl = URL.createObjectURL(file);
        previewGambar.src = previewUrl;
        previewContainer.style.display = 'block';

    });

});
</script>

@endsection
