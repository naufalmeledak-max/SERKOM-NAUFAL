@extends('layout.index')

@section('content')

<div class="content-wrapper">

    {{-- Judul Halaman --}}
    <div class="page-header">
        <h3 class="page-title">
            Data Berita
        </h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Berita
                </li>
            </ol>
        </nav>
    </div>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card Tabel --}}
    <div class="row">
        <div class="col-12 grid-margin stretch-card">

            <div class="card">

                {{-- Header Card --}}
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h4 class="card-title mb-0">
                            Data Berita
                        </h4>

                        <a href="{{ route('berita.create') }}"
                           class="btn btn-primary">
                            <i class="mdi mdi-plus"></i>
                            Tambah Berita
                        </a>

                    </div>

                    {{-- Tabel --}}
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Isi Berita</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($berita as $item)

                                    <tr>

                                        {{-- Nomor --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        {{-- Gambar --}}
                                        <td>

                                            @if ($item->gambar)

                                                <img src="{{ asset('assets/images/berita/' . $item->gambar) }}"
                                                     alt="{{ $item->judul }}"
                                                     style="width: 70px; height: 50px; object-fit: cover; border-radius: 5px;">

                                            @else

                                                <span class="text-muted">
                                                    Tidak ada gambar
                                                </span>

                                            @endif

                                        </td>

                                        {{-- Judul --}}
                                        <td>
                                            <strong>
                                                {{ $item->judul }}
                                            </strong>
                                        </td>

                                        {{-- Isi Berita --}}
                                        <td>
                                            {{ \Illuminate\Support\Str::limit($item->isi, 80) }}
                                        </td>

                                        {{-- Tanggal --}}
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                        </td>

                                        {{-- User --}}
                                        <td>
                                            {{ $item->user->name ?? '-' }}
                                        </td>

                                        {{-- Status --}}
                                        <td>

                                            @if ($item->status == 'Publish')

                                                <label class="badge badge-success">
                                                    Publish
                                                </label>

                                            @else

                                                <label class="badge badge-warning">
                                                    Draft
                                                </label>

                                            @endif

                                        </td>

                                        {{-- Aksi --}}
                                        <td>

                                            <div class="d-flex">

                                                {{-- Detail --}}
                                                <a href="{{ route('berita.show', $item->id) }}"
                                                   class="btn btn-info btn-sm me-1"
                                                   title="Lihat">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>

                                                {{-- Edit --}}
                                                <a href="{{ route('berita.edit', $item->id) }}"
                                                   class="btn btn-warning btn-sm me-1"
                                                   title="Edit">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>

                                                {{-- Hapus --}}
                                                <form action="{{ route('berita.destroy', $item->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus berita ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="btn btn-danger btn-sm"
                                                            title="Hapus">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="8" class="text-center">

                                            <div class="py-4">

                                                <i class="mdi mdi-newspaper-variant-outline"
                                                   style="font-size: 50px;">
                                                </i>

                                                <h5 class="mt-3">
                                                    Belum ada berita
                                                </h5>

                                                <p class="text-muted">
                                                    Silakan tambahkan berita baru.
                                                </p>

                                                <a href="{{ route('berita.create') }}"
                                                   class="btn btn-primary">

                                                    <i class="mdi mdi-plus"></i>
                                                    Tambah Berita

                                                </a>

                                            </div>

                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
