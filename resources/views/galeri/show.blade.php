@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title mb-4">
                        Detail Galeri
                    </h4>

                    <div class="text-center mb-4">

                        @if($galeri->kategori == 'Foto')

                            <img
                                src="{{ asset('assets/images/galeri/' . $galeri->file) }}"
                                alt="{{ $galeri->judul }}"
                                style="max-width: 100%; width: 500px; max-height: 350px; object-fit: contain;"
                                class="rounded"
                            >

                        @else

                            <video
                                controls
                                style="max-width: 100%; width: 500px; max-height: 350px;">

                                <source
                                    src="{{ asset('assets/images/galeri/' . $galeri->file) }}">

                                Browser kamu tidak mendukung video.

                            </video>

                        @endif

                    </div>

                    <table class="table">

                        <tr>

                            <th width="200">
                                Judul
                            </th>

                            <td>
                                {{ $galeri->judul }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Keterangan
                            </th>

                            <td>
                                {{ $galeri->keterangan }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Kategori
                            </th>

                            <td>

                                @if($galeri->kategori == 'Foto')

                                    <span class="badge badge-success">
                                        Foto
                                    </span>

                                @else

                                    <span class="badge badge-info">
                                        Video
                                    </span>

                                @endif

                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tanggal
                            </th>

                            <td>
                                {{ $galeri->tanggal }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Nama File
                            </th>

                            <td>
                                {{ $galeri->file }}
                            </td>

                        </tr>

                    </table>

                    <div class="mt-4">

                        <a href="{{ route('galeri.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                        <a href="{{ route('galeri.edit', $galeri->id) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('galeri.destroy', $galeri->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data galeri ini?')">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
