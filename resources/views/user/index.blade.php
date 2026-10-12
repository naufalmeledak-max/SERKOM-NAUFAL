@extends('layout.index')

@section('title', 'Data User')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Data User
    </h3>

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                Dashboard
            </li>

            <li class="breadcrumb-item active">
                User
            </li>

        </ol>

    </nav>

</div>


<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="card-title">
                        Data User
                    </h4>

                    <a href="{{ route('user.create') }}"
                       class="btn btn-success">

                        <i class="mdi mdi-plus"></i>

                        Tambah User

                    </a>

                </div>


                {{-- SUCCESS --}}

                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif


                {{-- ERROR --}}

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <div class="table-responsive">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th>
                                    ID
                                </th>

                                <th>
                                    Username
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($users as $user)

                            <tr>

                                <td>
                                    {{ $user->id_user }}
                                </td>

                                <td>
                                    {{ $user->name }}
                                </td>

                                <td>

                                    @if($user->role == 'Admin')

                                        <label class="badge badge-success">
                                            Admin
                                        </label>

                                    @else

                                        <label class="badge badge-info">
                                            Operator
                                        </label>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('user.show', $user->id_user) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="mdi mdi-eye"></i>

                                    </a>


                                    <a href="{{ route('user.edit', $user->id_user) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="mdi mdi-pencil"></i>

                                    </a>


                                   <form action="{{ route('user.destroy', $user->id_user) }}"
                                        method="POST"
                                        style="display:inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">

                                            <i class="mdi mdi-delete"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="4"
                                    class="text-center">

                                    Belum ada data user.

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
