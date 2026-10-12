@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="page-header">

        <h3 class="page-title">
            Tambah Pengumuman
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
                    Tambah
                </li>

            </ol>

        </nav>

    </div>


    {{-- Error --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row">

        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Form Tambah Pengumuman
                    </h4>

                    <p class="card-description">
                        Silakan isi data pengumuman
                    </p>


                    <form action="{{ route('pengumuman.store') }}"
                          method="POST">

                        @csrf


                        {{-- Judul --}}
                        <div class="form-group">

                            <label for="judul">
                                Judul Pengumuman
                            </label>

                            <input type="text"
                                   name="judul"
                                   id="judul"
                                   class="form-control"
                                   placeholder="Masukkan judul pengumuman"
                                   value="{{ old('judul') }}"
                                   maxlength="50"
                                   required>

                        </div>


                        {{-- Isi --}}
                        <div class="form-group">

                            <label for="isi">
                                Isi Pengumuman
                            </label>

                            <textarea name="isi"
                                      id="isi"
                                      rows="6"
                                      class="form-control"
                                      placeholder="Masukkan isi pengumuman"
                                      required>{{ old('isi') }}</textarea>

                        </div>


                        {{-- Tanggal --}}
                        <div class="form-group">

                            <label for="tanggal">
                                Tanggal
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   id="tanggal"
                                   class="form-control"
                                   value="{{ old('tanggal') }}"
                                   required>

                        </div>


                        {{-- Status --}}
                        <div class="form-group">

                            <label for="status">
                                Status
                            </label>

                            <select name="status"
                                    id="status"
                                    class="form-control"
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
                                class="btn btn-primary me-2">

                            <i class="mdi mdi-content-save"></i>
                            Simpan

                        </button>


                        <a href="{{ route('pengumuman.index') }}"
                           class="btn btn-light">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
