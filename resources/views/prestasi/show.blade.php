@extends('layout.index')

@section('content')

<div class="row">

    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Detail Prestasi
                </h4>

                <div class="row">

                    {{-- Foto --}}
                    <div class="col-md-4 text-center mb-4">

                        @if($prestasi->foto)

                            <img src="{{ asset('assets/images/prestasi/' . $prestasi->foto) }}"
                                 class="img-fluid"
                                 style="max-height:300px; object-fit:cover; border-radius:10px;">

                        @else

                            <p class="text-muted">
                                Tidak ada foto
                            </p>

                        @endif

                    </div>

                    {{-- Data --}}
                    <div class="col-md-8">

                        <table class="table table-bordered">

                            <tr>
                                <th width="35%">Nama Prestasi</th>
                                <td>{{ $prestasi->nama_prestasi }}</td>
                            </tr>

                            <tr>
                                <th>Nama Siswa</th>
                                <td>{{ $prestasi->nama_siswa }}</td>
                            </tr>

                            <tr>
                                <th>Tingkat</th>
                                <td>{{ $prestasi->tingkat }}</td>
                            </tr>

                            <tr>
                                <th>Peringkat</th>
                                <td>{{ $prestasi->peringkat }}</td>
                            </tr>

                            <tr>
                                <th>Keterangan</th>
                                <td>{{ $prestasi->keterangan }}</td>
                            </tr>

                            <tr>
                                <th>Tahun Ajaran</th>
                                <td>{{ $prestasi->tahun_ajaran }}</td>
                            </tr>

                        </table>

                    </div>

                </div>

                <div class="mt-4">

                    <a href="{{ route('prestasi.edit', $prestasi->id) }}"
                       class="btn btn-warning">

                        <i class="mdi mdi-pencil"></i>
                        Edit

                    </a>

                    <form action="{{ route('prestasi.destroy', $prestasi->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus data prestasi ini?')">

                            <i class="mdi mdi-delete"></i>
                            Hapus

                        </button>

                    </form>

                    <a href="{{ route('prestasi.index') }}"
                       class="btn btn-light">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
