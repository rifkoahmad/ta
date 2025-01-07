@extends('template.index')
@section('title', 'Edit Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tempat-pkl.index') }}">Data Tempat PKL</a></div>
                    <div class="breadcrumb-item">Edit Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Edit Data Jurusan</h2>
                <p class="section-lead">
                    Perbarui data jurusan kampus vokasi Politeknik Negeri Padang.
                </p> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Tempat PKL</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tempat-pkl.update', $tempatPKL->id_tempat_pkl) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="nama_tempat_pkl">Nama Tempat PKL</label>
                                        <input type="text" name="nama_tempat_pkl" id="nama_tempat_pkl"
                                            class="form-control @error('nama_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('nama_tempat_pkl', $tempatPKL->nama_tempat_pkl) }}">
                                        @error('nama_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('tempat-pkl.index') }}" class="btn btn-warning">
                                            <i class="fas fa-arrow-left"></i> Back
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
