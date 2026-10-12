@extends('layout.index')

@section('content')
<div class="container-fluid data-admin-page py-4">
    <div class="mb-4">
        <a href="{{ route('data-admin.index') }}" class="data-admin-back"><i class="bi bi-arrow-left me-2"></i>Kembali ke Data Diri</a>
        <div class="data-admin-eyebrow mt-3"><i class="bi bi-person-plus-fill me-2"></i>Data Baru</div>
        <h1 class="data-admin-title">Tambah Data Diri</h1>
        <p class="data-admin-subtitle mb-0">Lengkapi informasi dan pilih foto yang ingin disimpan.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger"><strong>Data belum bisa disimpan.</strong><ul class="mb-0 mt-2">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <div class="row g-4">
        <div class="col-12 col-xl-8">
            <div class="card data-admin-form-card">
                <div class="card-header"><h5 class="mb-1">Informasi Profil</h5><small>Kolom bertanda * wajib diisi.</small></div>
                <div class="card-body p-4">
                    <form action="{{ route('data-admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-control form-control-lg @error('nama_lengkap') is-invalid @enderror" maxlength="50" placeholder="Masukkan nama lengkap" required>
                            @error('nama_lengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="kelas" class="form-label">Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}" class="form-control form-control-lg @error('kelas') is-invalid @enderror" maxlength="50" placeholder="Contoh: XII RPL 1" required>
                            @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto Profil <span class="text-danger">*</span></label>
                            <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required>
                            <div class="form-text">Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.</div>
                            @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex flex-wrap gap-2 justify-content-end pt-2">
                            <a href="{{ route('data-admin.index') }}" class="btn btn-light px-4">Batal</a>
                            <button type="submit" class="btn btn-primary data-admin-primary-btn"><i class="bi bi-save me-2"></i>Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-4">
            <div class="card data-admin-preview-card">
                <div class="card-body p-4">
                    <h6 class="mb-3">Pratinjau Foto</h6>
                    <div class="data-admin-upload-preview" id="fotoPreviewBox"><i class="bi bi-image"></i><span>Foto yang dipilih akan tampil di sini</span></div>
                    <p class="small text-muted mt-3 mb-0">Gunakan foto yang jelas agar mudah dikenali pada halaman data diri.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('foto');
    const box = document.getElementById('fotoPreviewBox');
    if (!input || !box) return;
    input.addEventListener('change', function () {
        const file = this.files && this.files[0];
        if (!file) {
            box.innerHTML = '<i class="bi bi-image"></i><span>Foto yang dipilih akan tampil di sini</span>';
            return;
        }
        if (!file.type.startsWith('image/')) return;
        const image = document.createElement('img');
        image.alt = 'Pratinjau foto';
        image.src = URL.createObjectURL(file);
        box.replaceChildren(image);
    });
});
</script>
@endsection
