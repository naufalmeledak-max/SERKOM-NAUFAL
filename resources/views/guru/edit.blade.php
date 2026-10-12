@extends('layout.index')

@section('title', 'Edit Guru')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Edit Guru
    </h3>

</div>


<div class="row">

    <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Edit Data Guru
                </h4>


                <form action="{{ route('guru.update', $guru->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    {{-- Nama Guru --}}

                    <div class="form-group">

                        <label for="nama_guru">
                            Nama Guru
                        </label>

                        <input type="text"
                               class="form-control"
                               id="nama_guru"
                               name="nama_guru"
                               value="{{ old('nama_guru', $guru->nama_guru) }}">

                    </div>


                    {{-- NIP --}}

                    <div class="form-group">

                        <label for="nip">
                            NIP
                        </label>

                        <input type="text"
                               class="form-control"
                               id="nip"
                               name="nip"
                               value="{{ old('nip', $guru->nip) }}">

                    </div>


                    {{-- Mata Pelajaran --}}

                    <div class="form-group">

                        <label for="mapel">
                            Mata Pelajaran
                        </label>

                        <input type="text"
                               class="form-control"
                               id="mapel"
                               name="mapel"
                               value="{{ old('mapel', $guru->mapel) }}">

                    </div>


                    {{-- Foto Lama --}}

                    <div class="form-group">

                        <label>
                            Foto Saat Ini
                        </label>

                        <div>

                            @if($guru->foto)

                                <img src="{{ asset('assets/images/guru/' . $guru->foto) }}"
                                     alt="Foto Guru"
                                     style="
                                        width: 120px;
                                        height: 120px;
                                        object-fit: cover;
                                        border-radius: 10px;
                                     ">

                            @else

                                <p class="text-muted">
                                    Belum ada foto.
                                </p>

                            @endif

                        </div>

                    </div>


                    {{-- Foto Baru --}}

                    <div class="form-group">

                        <label for="foto">
                            Ganti Foto
                        </label>

                        <input type="file"
                               class="form-control"
                               id="foto"
                               name="foto"
                               accept="image/*">

                        <small class="form-text text-muted">
                            Kosongkan jika tidak ingin mengganti foto.
                        </small>

                    </div>


                    <button type="submit"
                            class="btn btn-warning">

                        <i class="mdi mdi-pencil"></i>

                        Update

                    </button>


                    <a href="{{ route('guru.index') }}"
                       class="btn btn-light">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
