@extends('layout.index')

@section('title', 'Detail Guru')

@section('content')

<div class="page-header">

    <h3 class="page-title">
        Detail Guru
    </h3>

</div>


<div class="row">

    <div class="col-md-6 grid-margin stretch-card">

        <div class="card">

            <div class="card-body text-center">

                @if($guru->foto)

                    <img src="{{ asset('assets/images/guru/' . $guru->foto) }}"
                         alt="Foto {{ $guru->nama_guru }}"
                         style="
                            width: 180px;
                            height: 180px;
                            object-fit: cover;
                            border-radius: 50%;
                         "
                         class="mb-4">

                @else

                    <i class="mdi mdi-account-circle"
                       style="font-size: 180px;">
                    </i>

                @endif


                <h4 class="card-title">
                    {{ $guru->nama_guru }}
                </h4>


                <p>
                    <strong>NIP</strong>
                    <br>
                    {{ $guru->nip }}
                </p>


                <p>
                    <strong>Mata Pelajaran</strong>
                    <br>
                    {{ $guru->mapel }}
                </p>


                <a href="{{ route('guru.edit', $guru->id) }}"
                   class="btn btn-warning">

                    <i class="mdi mdi-pencil"></i>

                    Edit

                </a>


                <a href="{{ route('guru.index') }}"
                   class="btn btn-light">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
