@extends('layout.index')

@section('title', 'Tambah Guru')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Tambah Guru
    </h3>

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('guru.index') }}">
                    Guru
                </a>
            </li>

            <li class="breadcrumb-item active">
                Tambah
            </li>

        </ol>

    </nav>

</div>


<div class="row">

    <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Form Tambah Guru
                </h4>


                <form action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text"
                            name="nama_guru"
                            class="form-control"
                            placeholder="Masukkan nama guru"
                            required>
                    </div>

                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text"
                            name="nip"
                            class="form-control"
                            placeholder="Masukkan NIP"
                            required>
                    </div>


                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>

                        <select name="mapel"
                                id="mapel"
                                class="form-control @error('mapel') is-invalid @enderror"
                                required>

                            <option value="">Pilih Mata Pelajaran</option>

                            @foreach($mapel as $item)
                                <option value="{{ $item->nama_mapel }}"
                                    {{ old('mapel') == $item->nama_mapel ? 'selected' : '' }}>
                                    {{ $item->nama_mapel }}
                                </option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group">
                        <label>Foto Guru</label>
                        <input type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('guru.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
