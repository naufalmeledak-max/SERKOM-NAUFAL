@extends('layout.index')

@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-md-8 mx-auto">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">
                        Edit Galeri
                    </h4>

                    <p class="card-description">
                        Form edit data galeri
                    </p>

                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('galeri.update', $galeri->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group">

                            <label>
                                Judul
                            </label>

                            <input type="text"
                                   name="judul"
                                   class="form-control"
                                   value="{{ old('judul', $galeri->judul) }}"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>
                                Keterangan
                            </label>

                            <textarea name="keterangan"
                                      class="form-control"
                                      rows="5"
                                      required>{{ old('keterangan', $galeri->keterangan) }}</textarea>

                        </div>

                        <div class="form-group">

                            <label>
                                Kategori
                            </label>

                            <select name="kategori"
                                    class="form-control"
                                    required>

                                <option value="Foto"
                                    {{ old('kategori', $galeri->kategori) == 'Foto' ? 'selected' : '' }}>
                                    Foto
                                </option>

                                <option value="Video"
                                    {{ old('kategori', $galeri->kategori) == 'Video' ? 'selected' : '' }}>
                                    Video
                                </option>

                            </select>

                        </div>

                        <div class="form-group">

                            <label>
                                Tanggal
                            </label>

                            <input type="date"
                                   name="tanggal"
                                   class="form-control"
                                   value="{{ old('tanggal', $galeri->tanggal) }}"
                                   required>

                        </div>

                        <div class="form-group">

                            <label>
                                File Saat Ini
                            </label>

                            <br>

                            @if($galeri->kategori == 'Foto')

                                <img
                                    src="{{ asset('assets/images/galeri/' . $galeri->file) }}"
                                    width="200"
                                    style="object-fit: cover;"
                                    class="rounded mb-3"
                                    alt="{{ $galeri->judul }}"
                                >

                            @else

                                <p>
                                    <span class="badge badge-info">
                                        File Video
                                    </span>
                                </p>

                                <p class="text-muted">
                                    {{ $galeri->file }}
                                </p>

                            @endif

                        </div>

                        <div class="form-group">

                            <label>
                                Ganti File
                            </label>

                            <input type="file"
                                   name="file"
                                   class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp,.mp4,.mov,.avi">

                            <small class="form-text text-muted">
                                Kosongkan jika tidak ingin mengganti file.
                                Maksimal 20 MB.
                            </small>

                        </div>

                        <button type="submit"
                                class="btn btn-primary">
                            Update
                        </button>

                        <a href="{{ route('galeri.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
