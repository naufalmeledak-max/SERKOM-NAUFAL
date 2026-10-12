@extends('layout.index')

@section('content')
<div class="container-fluid data-admin-page py-4">
    <div class="mb-4">
        <a href="{{ route('data-admin.index') }}" class="data-admin-back"><i class="bi bi-arrow-left me-2"></i>Kembali ke Data Diri</a>
        <div class="data-admin-eyebrow mt-3"><i class="bi bi-person-vcard-fill me-2"></i>Detail Profil</div>
        <h1 class="data-admin-title">Detail Data Diri</h1>
        <p class="data-admin-subtitle mb-0">Informasi lengkap dari data yang dipilih.</p>
    </div>

    <div class="card data-admin-detail-card">
        <div class="row g-0">
            <div class="col-12 col-md-5 col-xl-4">
                <div class="data-admin-detail-photo">
                    @if($item->foto && file_exists(public_path('assets/images/data/' . $item->foto)))
                        <img src="{{ asset('assets/images/data/' . $item->foto) }}" alt="Foto {{ $item->nama_lengkap }}">
                    @else
                        <i class="bi bi-person-fill"></i>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-7 col-xl-8">
                <div class="card-body p-4 p-lg-5">
                    <span class="data-admin-count mb-3 d-inline-flex">ID #{{ $item->id }}</span>
                    <h2 class="data-admin-detail-name">{{ $item->nama_lengkap }}</h2>
                    <div class="data-admin-detail-field"><span><i class="bi bi-person-badge me-2"></i>Nama Lengkap</span><strong>{{ $item->nama_lengkap }}</strong></div>
                    <div class="data-admin-detail-field"><span><i class="bi bi-mortarboard me-2"></i>Kelas</span><strong>{{ $item->kelas }}</strong></div>
                    <div class="data-admin-detail-field"><span><i class="bi bi-calendar3 me-2"></i>Dibuat</span><strong>{{ $item->created_at?->format('d M Y, H:i') ?? '-' }}</strong></div>
                    <div class="data-admin-detail-field"><span><i class="bi bi-clock-history me-2"></i>Diperbarui</span><strong>{{ $item->updated_at?->format('d M Y, H:i') ?? '-' }}</strong></div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('data-admin.edit', $item->id) }}" class="btn btn-primary data-admin-primary-btn"><i class="bi bi-pencil-square me-2"></i>Edit Data</a>
                        <a href="{{ route('data-admin.index') }}" class="btn btn-light">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
