@extends('layout.index')

@section('title', 'Detail User')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Detail User
    </h3>

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">
                    User
                </a>
            </li>

            <li class="breadcrumb-item active">
                Detail
            </li>

        </ol>

    </nav>

</div>


<div class="row">

    <div class="col-md-8 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Detail User
                </h4>

                <p class="card-description">
                    Informasi data user
                </p>


                <div class="table-responsive">

                    <table class="table table-bordered">

                        <tr>

                            <th width="30%">
                                ID User
                            </th>

                            <td>
                                {{ $user->id_user }}
                            </td>

                        </tr>


                        <tr>

                            <th>
                                Username
                            </th>

                            <td>
                                {{ $user->name }}
                            </td>

                        </tr>


                        <tr>

                            <th>
                                Role
                            </th>

                            <td>

                                @if($user->role == 'Admin')

                                    <label class="badge badge-danger">
                                        Admin
                                    </label>

                                @else

                                    <label class="badge badge-info">
                                        Operator
                                    </label>

                                @endif

                            </td>

                        </tr>


                        <tr>

                            <th>
                                Dibuat
                            </th>

                            <td>
                                {{ $user->created_at }}
                            </td>

                        </tr>


                        <tr>

                            <th>
                                Terakhir Diubah
                            </th>

                            <td>
                                {{ $user->updated_at }}
                            </td>

                        </tr>

                    </table>

                </div>


                <br>


                <a href="{{ route('user.edit', $user->id_user) }}"
                   class="btn btn-warning">

                    <i class="mdi mdi-pencil"></i>

                    Edit

                </a>


                <form action="{{ route('user.destroy', $user->id_user) }}"
                      method="POST"
                      style="display:inline">

                    @csrf

                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger"
                            onclick="return confirm('Yakin ingin menghapus user ini?')">

                        <i class="mdi mdi-delete"></i>

                        Hapus

                    </button>

                </form>


                <a href="{{ route('user.index') }}"
                   class="btn btn-dark">

                    <i class="mdi mdi-arrow-left"></i>

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
