@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title">
                            Data Siswa
                        </h4>

                        <a href="{{ route('siswa.create') }}"
                           class="btn btn-primary">
                            + Tambah Siswa
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
                                    <th>NISN</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tahun Masuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($siswa as $data)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $data->nisn }}
                                    </td>

                                    <td>
                                        {{ $data->nama_siswa }}
                                    </td>

                                    <td>
                                        {{ $data->jenis_kelamin }}
                                    </td>

                                    <td>
                                        {{ $data->tahun_masuk }}
                                    </td>

                                    <td>

                                        <a href="{{ route('siswa.show', $data->id) }}"
                                           class="btn btn-info btn-sm">
                                            Detail
                                        </a>

                                        <a href="{{ route('siswa.edit', $data->id) }}"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('siswa.destroy', $data->id) }}"
                                              method="POST"
                                              style="display:inline;">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                                @empty

                                <tr>
                                    <td colspan="6" class="text-center">
                                        Belum ada data siswa.
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
