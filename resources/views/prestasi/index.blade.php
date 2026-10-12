@extends('layout.index')

@section('content')

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="card-title mb-0">
                        Data Prestasi
                    </h4>

                    <a href="{{ route('prestasi.create') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>
                        Tambah Prestasi

                    </a>

                </div>

                {{-- Pesan berhasil --}}
                @if(session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Prestasi</th>
                                <th>Nama Siswa</th>
                                <th>Tingkat</th>
                                <th>Peringkat</th>
                                <th>Keterangan</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($prestasi as $data)

                            <tr>

                                {{-- No --}}
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Foto --}}
                                <td>

                                    @if($data->foto)

                                        <img src="{{ asset('assets/images/prestasi/' . $data->foto) }}"
                                             width="80"
                                             height="80"
                                             style="object-fit: cover; border-radius: 5px;">

                                    @else

                                        <span class="text-muted">
                                            Tidak ada foto
                                        </span>

                                    @endif

                                </td>

                                {{-- Nama Prestasi --}}
                                <td>
                                    {{ $data->nama_prestasi }}
                                </td>

                                {{-- Nama Siswa --}}
                                <td>
                                    {{ $data->nama_siswa }}
                                </td>

                                {{-- Tingkat --}}
                                <td>
                                    {{ $data->tingkat }}
                                </td>

                                {{-- Peringkat --}}
                                <td>
                                    {{ $data->peringkat }}
                                </td>

                                {{-- Keterangan --}}
                                <td>
                                    {{ $data->keterangan }}
                                </td>

                                {{-- Tahun Ajaran --}}
                                <td>
                                    {{ $data->tahun_ajaran }}
                                </td>

                                {{-- Aksi --}}
                                <td>

                                    <a href="{{ route('prestasi.show', $data->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="mdi mdi-eye"></i>
                                        Detail

                                    </a>

                                    <a href="{{ route('prestasi.edit', $data->id) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="mdi mdi-pencil"></i>
                                        Edit

                                    </a>

                                    <form action="{{ route('prestasi.destroy', $data->id) }}"
                                          method="POST"
                                          style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data prestasi ini?')">

                                            <i class="mdi mdi-delete"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="9" class="text-center">

                                    Belum ada data prestasi.

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

@endsection
