@extends('layout.index')

@section('title', 'Data Guru')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Data Guru
    </h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                Guru
            </li>
        </ol>
    </nav>

</div>


@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        {{ session('success') }}

        <button type="button"
                class="close"
                data-dismiss="alert">

            <span>&times;</span>

        </button>

    </div>

@endif


<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="card-title mb-0">
                        Data Guru
                    </h4>

                    <a href="{{ route('guru.create') }}"
                       class="btn btn-primary">

                        <i class="mdi mdi-plus"></i>

                        Tambah Guru

                    </a>

                </div>


                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Foto</th>

                                <th>Nama Guru</th>

                                <th>NIP</th>

                                <th>Mata Pelajaran</th>

                                <th>Aksi</th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($guru as $data)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>

                                        @if($data->foto)

                                            <img src="{{ asset('assets/images/guru/' . $data->foto) }}"
                                                 alt="Foto Guru"
                                                 style="
                                                    width: 50px;
                                                    height: 50px;
                                                    object-fit: cover;
                                                    border-radius: 50%;
                                                 ">

                                        @else

                                            <i class="mdi mdi-account-circle"
                                               style="font-size: 40px;">
                                            </i>

                                        @endif

                                    </td>


                                    <td>
                                        {{ $data->nama_guru }}
                                    </td>


                                    <td>
                                        {{ $data->nip }}
                                    </td>


                                    <td>
                                        {{ $data->mapel }}
                                    </td>


                                    <td>

                                        <a href="{{ route('guru.show', $data->id) }}"
                                           class="btn btn-info btn-sm">

                                            <i class="mdi mdi-eye"></i>

                                        </a>


                                        <a href="{{ route('guru.edit', $data->id) }}"
                                           class="btn btn-warning btn-sm">

                                            <i class="mdi mdi-pencil"></i>

                                        </a>


                                        <form action="{{ route('guru.destroy', $data->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data guru ini?')">

                                                <i class="mdi mdi-delete"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6"
                                        class="text-center">

                                        Data guru belum tersedia.

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
