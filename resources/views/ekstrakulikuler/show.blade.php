@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title mb-4">
                        Detail Ekstrakulikuler
                    </h4>

                    <div class="text-center mb-4">

                        @if($ekstrakulikuler->gambar)

                            <img
                                src="{{ asset('assets/images/ekstrakulikuler/' . $ekstrakulikuler->gambar) }}"
                                alt="{{ $ekstrakulikuler->nama_eskul }}"
                                style="width: 250px; height: 180px; object-fit: cover;"
                                class="rounded"
                            >

                        @else

                            <p class="text-muted">
                                Tidak ada gambar
                            </p>

                        @endif

                    </div>

                    <table class="table">

                        <tr>
                            <th width="200">
                                Nama Ekstrakulikuler
                            </th>

                            <td>
                                {{ $ekstrakulikuler->nama_eskul }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Pembina
                            </th>

                            <td>
                                {{ $ekstrakulikuler->pembina }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Jadwal Latihan
                            </th>

                            <td>
                                {{ $ekstrakulikuler->jadwal_latihan }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Deskripsi
                            </th>

                            <td>
                                {{ $ekstrakulikuler->deskripsi }}
                            </td>
                        </tr>

                    </table>

                    <div class="mt-4">

                        <a href="{{ route('ekstrakulikuler.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                        <a href="{{ route('ekstrakulikuler.edit', $ekstrakulikuler->id) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
