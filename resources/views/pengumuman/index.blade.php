@extends('layout.index')

@section('content')

<div class="content-wrapper">

    {{-- Header --}}
    <div class="page-header">

        <h3 class="page-title">
            Data Pengumuman
        </h3>

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Pengumuman
                </li>

            </ol>

        </nav>

    </div>


    {{-- Pesan sukses --}}
    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show"
             role="alert">

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Error --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Card --}}
    <div class="row">

        <div class="col-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">


                    {{-- Header Card --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h4 class="card-title mb-0">
                            Data Pengumuman
                        </h4>

                        <a href="{{ route('pengumuman.create') }}"
                           class="btn btn-primary">

                            <i class="mdi mdi-plus"></i>

                            Tambah Pengumuman

                        </a>

                    </div>


                    {{-- Table --}}
                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Judul</th>

                                    <th>Isi Pengumuman</th>

                                    <th>Tanggal</th>

                                    <th>User</th>

                                    <th>Status</th>

                                    <th>Aksi</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse ($pengumuman as $item)

                                    <tr>

                                        {{-- Nomor --}}
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>


                                        {{-- Judul --}}
                                        <td>

                                            <strong>
                                                {{ $item->judul }}
                                            </strong>

                                        </td>


                                        {{-- Isi --}}
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

                                                {{-- Lihat --}}
                                                <a href="{{ route('pengumuman.show', $item->id) }}"
                                                   class="btn btn-info btn-sm me-1"
                                                   title="Lihat">

                                                    <i class="mdi mdi-eye"></i>

                                                </a>


                                                {{-- Edit --}}
                                                <a href="{{ route('pengumuman.edit', $item->id) }}"
                                                   class="btn btn-warning btn-sm me-1"
                                                   title="Edit">

                                                    <i class="mdi mdi-pencil"></i>

                                                </a>


                                                {{-- Hapus --}}
                                                <form action="{{ route('pengumuman.destroy', $item->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus pengumuman ini?')">

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

                                        <td colspan="7"
                                            class="text-center">

                                            <div class="py-4">

                                                <i class="mdi mdi-bullhorn-outline"
                                                   style="font-size: 50px;">
                                                </i>

                                                <h5 class="mt-3">
                                                    Belum ada pengumuman
                                                </h5>

                                                <p class="text-muted">
                                                    Silakan tambahkan pengumuman baru.
                                                </p>

                                                <a href="{{ route('pengumuman.create') }}"
                                                   class="btn btn-primary">

                                                    <i class="mdi mdi-plus"></i>

                                                    Tambah Pengumuman

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
