
@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h4 class="card-title">
                            Data Diri
                        </h4>

                        <a href="{{ route('data-admin.create') }}"
                           class="btn btn-primary">
                            + Tambah Data Diri
                        </a>

                    </div>

                    {{-- PESAN BERHASIL --}}

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- PESAN VALIDASI --}}

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- TABEL DATA DIRI --}}

                    <div class="table-responsive">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($dataDiri as $item)

                                    <tr>

                                        <td>
                                            {{ $dataDiri->firstItem() + $loop->index }}
                                        </td>

                                        <td>

                                            @if($item->foto)

                                                <img
                                                    src="{{ asset('assets/images/data/' . $item->foto) }}"
                                                    width="80"
                                                    height="80"
                                                    style="object-fit: cover; border-radius: 5px;"
                                                    alt="Foto {{ $item->nama_lengkap }}">

                                            @else

                                                Tidak ada foto

                                            @endif

                                        </td>

                                        <td>
                                            {{ $item->nama_lengkap }}
                                        </td>

                                        <td>
                                            {{ $item->kelas }}
                                        </td>

                                        <td>

                                            {{-- DETAIL --}}

                                            <a href="{{ route('data-admin.show', $item->id) }}"
                                               class="btn btn-info btn-sm">
                                                Detail
                                            </a>

                                            {{-- EDIT --}}

                                            <a href="{{ route('data-admin.edit', $item->id) }}"
                                               class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            {{-- HAPUS --}}

                                            <form
                                                action="{{ route('data-admin.destroy', $item->id) }}"
                                                method="POST"
                                                style="display: inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data diri ini?')">

                                                    Hapus

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Belum ada data diri.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- PAGINATION --}}

                    @if($dataDiri->hasPages())

                        <div class="mt-3">
                            {{ $dataDiri->links() }}
                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
