@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title">
                            Data Galeri
                        </h4>

                        <a href="{{ route('galeri.create') }}"
                           class="btn btn-primary">
                            + Tambah Galeri
                        </a>

                    </div>

                    @if(session('success'))

                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>

                    @endif

                    <div class="table-responsive">

                        <table class="table table-striped">

                            <thead>

                                <tr>
                                    <th>No</th>
                                    <th>File</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse($galeri as $data)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>

                                            @if($data->kategori == 'Foto')

                                                <img
                                                    src="{{ asset('assets/images/galeri/' . $data->file) }}"
                                                    width="80"
                                                    height="60"
                                                    style="object-fit: cover;"
                                                    alt="{{ $data->judul }}"
                                                >

                                            @else

                                                <span class="badge badge-info">
                                                    Video
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $data->judul }}
                                        </td>

                                        <td>
                                            {{ Str::limit($data->keterangan, 50) }}
                                        </td>

                                        <td>

                                            @if($data->kategori == 'Foto')

                                                <span class="badge badge-success">
                                                    Foto
                                                </span>

                                            @else

                                                <span class="badge badge-info">
                                                    Video
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $data->tanggal }}
                                        </td>

                                        <td>

                                            <a href="{{ route('galeri.show', $data->id) }}"
                                               class="btn btn-info btn-sm">
                                                Detail
                                            </a>

                                            <a href="{{ route('galeri.edit', $data->id) }}"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('galeri.destroy', $data->id) }}"
                                                  method="POST"
                                                  style="display:inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7"
                                            class="text-center">

                                            Belum ada data galeri.

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
