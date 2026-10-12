@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="page-header">

        <h3 class="page-title">
            Detail Berita
        </h3>

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('berita.index') }}">
                        Berita
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Detail
                </li>

            </ol>

        </nav>

    </div>


    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h4 class="card-title mb-0">
                            {{ $berita->judul }}
                        </h4>

                        <span>

                            @if ($berita->status == 'Publish')

                                <label class="badge badge-success">
                                    Publish
                                </label>

                            @else

                                <label class="badge badge-warning">
                                    Draft
                                </label>

                            @endif

                        </span>

                    </div>


                    {{-- Gambar --}}
                    @if ($berita->gambar)

                        <div class="text-center mb-4">

                            <img src="{{ asset('assets/images/berita/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 style="
                                    max-width: 700px;
                                    width: 100%;
                                    max-height: 400px;
                                    object-fit: cover;
                                    border-radius: 8px;
                                 ">

                        </div>

                    @endif


                    {{-- Informasi --}}
                    <div class="row mb-4">

                        <div class="col-md-6">

                            <p class="mb-1 text-muted">
                                Tanggal
                            </p>

                            <h6>
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d-m-Y') }}
                            </h6>

                        </div>


                        <div class="col-md-6">

                            <p class="mb-1 text-muted">
                                Penulis
                            </p>

                            <h6>
                                {{ $berita->user->name ?? '-' }}
                            </h6>

                        </div>

                    </div>


                    <hr>


                    {{-- Isi Berita --}}
                    <div class="mt-4">

                        <h5 class="mb-3">
                            Isi Berita
                        </h5>

                        <p style="line-height: 1.8; white-space: pre-line;">
                            {{ $berita->isi }}
                        </p>

                    </div>


                    {{-- Tombol --}}
                    <div class="mt-4">

                        <a href="{{ route('berita.edit', $berita->id) }}"
                           class="btn btn-warning mr-2">

                            <i class="mdi mdi-pencil"></i>
                            Edit

                        </a>

                        <a href="{{ route('berita.index') }}"
                           class="btn btn-light">

                            <i class="mdi mdi-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
