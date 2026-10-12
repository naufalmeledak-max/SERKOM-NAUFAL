@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Detail Siswa
                    </h4>

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">NISN</th>
                            <td>{{ $siswa->nisn }}</td>
                        </tr>

                        <tr>
                            <th>Nama Siswa</th>
                            <td>{{ $siswa->nama_siswa }}</td>
                        </tr>

                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $siswa->jenis_kelamin }}</td>
                        </tr>

                        <tr>
                            <th>Tahun Masuk</th>
                            <td>{{ $siswa->tahun_masuk }}</td>
                        </tr>

                    </table>

                    <br>

                    <a href="{{ route('siswa.edit', $siswa->id) }}"
                       class="btn btn-warning">
                        Edit
                    </a>

                    <a href="{{ route('siswa.index') }}"
                       class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
