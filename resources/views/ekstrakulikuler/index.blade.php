@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title">
                            Data Ekstrakulikuler
                        </h4>

                        <a href="{{ route('ekstrakulikuler.create') }}"
                           class="btn btn-primary">
                            + Tambah Ekstrakulikuler
                        </a>

                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Eskul</th>
                                    <th>Pembina</th>
                                    <th>Jadwal Latihan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($ekstrakulikuler as $data)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>

                                        @if($data->gambar)

                                            <img
                                                src="{{ asset('assets/images/ekstrakulikuler/' . $data->gambar) }}"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover;"
                                                alt="Gambar Eskul">

                                        @else

                                            Tidak ada gambar

                                        @endif

                                    </td>

                                    <td>
                                        {{ $data->nama_eskul }}
                                    </td>

                                    <td>
                                        {{ $data->pembina }}
                                    </td>

                                    <td>
                                        {{ $data->jadwal_latihan }}
                                    </td>

                                    <td>
                                        {{ Str::limit($data->deskripsi, 50) }}
                                    </td>

                                    <td>

                                        <a href="{{ route('ekstrakulikuler.show', $data->id) }}"
                                           class="btn btn-info btn-sm">
                                            Detail
                                        </a>

                                        <a href="{{ route('ekstrakulikuler.edit', $data->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('ekstrakulikuler.destroy', $data->id) }}"
                                            method="POST"
                                            style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="7" class="text-center">
                                        Belum ada data ekstrakulikuler.
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
