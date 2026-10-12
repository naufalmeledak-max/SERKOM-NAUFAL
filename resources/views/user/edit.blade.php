@extends('layout.index')

@section('title', 'Edit User')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Edit User
    </h3>

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="{{ route('user.index') }}">
                    User
                </a>

            </li>

            <li class="breadcrumb-item active">
                Edit User
            </li>

        </ol>

    </nav>

</div>


<div class="row">

    <div class="col-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Form Edit User
                </h4>

                <p class="card-description">
                    Ubah data user
                </p>


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


                <form class="forms-sample"
                      action="{{ route('user.update', $user->id_user) }}"
                      method="POST">

                    @csrf

                    @method('PUT')


                    {{-- USERNAME --}}

                    <div class="form-group">

                        <label for="username">
                            Username
                        </label>

                        <input type="text"
                               class="form-control"
                               id="username"
                               name="username"
                               value="{{ old('username', $user->username) }}"
                               placeholder="Masukkan username"
                               required>

                    </div>


                    {{-- PASSWORD --}}

                    <div class="form-group">

                        <label for="password">
                            Password Baru
                        </label>

                        <input type="password"
                               class="form-control"
                               id="password"
                               name="password"
                               placeholder="Kosongkan jika tidak ingin mengubah password">

                        <small class="form-text text-muted">

                            Kosongkan password jika tidak ingin mengubahnya.

                        </small>

                    </div>


                    {{-- ROLE --}}

                    <div class="form-group">

                        <label for="role">
                            Role
                        </label>

                        <select class="form-control"
                                id="role"
                                name="role"
                                required>

                            <option value="Admin"
                                {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                            <option value="Operator"
                                {{ old('role', $user->role) == 'Operator' ? 'selected' : '' }}>

                                Operator

                            </option>

                        </select>

                    </div>


                    {{-- BUTTON --}}

                    <button type="submit"
                            class="btn btn-success mr-2">

                        <i class="mdi mdi-content-save"></i>

                        Update

                    </button>


                    <a href="{{ route('user.index') }}"
                       class="btn btn-dark">

                        <i class="mdi mdi-arrow-left"></i>

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
