@extends('layout.index')

@section('title', 'Tambah User')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Tambah User
    </h3>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="{{ route('user.index') }}">
                    User
                </a>
            </li>

            <li class="breadcrumb-item active">
                Tambah User
            </li>

        </ol>
    </nav>

</div>


<div class="row">

    <div class="col-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Form Tambah User
                </h4>

                <p class="card-description">
                    Masukkan data user baru
                </p>


                {{-- Menampilkan error --}}

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
                      action="{{ route('user.store') }}"
                      method="POST">

                    @csrf


                    {{-- USERNAME --}}

                    <div class="form-group">

                        <label for="name">
                            Username
                        </label>

                        <input type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Masukkan username"
                            value="{{ old('name') }}"
                            required>

                    </div>

                    {{-- PASSWORD --}}

                    <div class="form-group">

                        <label for="password">
                            Password
                        </label>

                        <input type="password"
                               class="form-control"
                               id="password"
                               name="password"
                               placeholder="Masukkan password"
                               required>

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

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="Admin"
                                {{ old('role') == 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="Operator"
                                {{ old('role') == 'Operator' ? 'selected' : '' }}>
                                Operator
                            </option>

                        </select>

                    </div>


                    {{-- BUTTON --}}

                    <button type="submit"
                            class="btn btn-success mr-2">

                        <i class="mdi mdi-content-save"></i>

                        Simpan

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
