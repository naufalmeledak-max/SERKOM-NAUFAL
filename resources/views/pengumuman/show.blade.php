@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="page-header">

        <h3 class="page-title">
            Detail Pengumuman
        </h3>

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('pengumuman.index') }}">
                        Pengumuman
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


                    {{-- Judul --}}
                    <h4 class="card-title">

                        {{ $pengumuman->judul }}

                    </h4>


                    {{-- Status --}}
                    <div class="mb-3">

                        @if ($pengumuman->status == 'Publish')

                            <span class="badge badge-success">
                                Publish
                            </span>

                        @else

                            <span class="badge badge-warning">
                                Draft
                            </span>

                        @endif

                    </div>


                    {{-- Informasi --}}
                    <div class="row mb-4">

                        <div class="col-md-6">

                            <p class="text-muted mb-1">
                                Tanggal
                            </p>

                            <h6>

                                {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d-m-Y') }}

                            </h6>

                        </div>


                        <div class="col-md-6">

                            <p class="text-muted mb-1">
                                Dibuat oleh
                            </p>

                            <h6>

                                {{ $pengumuman->user->name ?? '-' }}

                            </h6>

                        </div>

                    </div>


                    <hr>


                    {{-- Isi --}}
                    <div class="mt-4">

                        <h5 class="mb-3">
                            Isi Pengumuman
                        </h5>

                        <p style="white-space: pre-line;">

                            {{ $pengumuman->isi }}

                        </p>

                    </div>


                    {{-- Tombol --}}
                    <div class="mt-4">

                        <a href="{{ route('pengumuman.index') }}"
                           class="btn btn-secondary">

                            <i class="mdi mdi-arrow-left"></i>

                            Kembali

                        </a>


                        <a href="{{ route('pengumuman.edit', $pengumuman->id) }}"
                           class="btn btn-warning">

                            <i class="mdi mdi-pencil"></i>

                            Edit

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
