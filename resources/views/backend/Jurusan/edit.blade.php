@extends('template.index')
@section('title', 'Edit Jurusan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Jurusan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('jurusan.index') }}">Data Jurusan</a></div>
                    <div class="breadcrumb-item">Edit Jurusan</div>
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
                                <h4>Edit Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('jurusan.update', $jurusan->id_jurusan) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="kode_jurusan">Kode Jurusan</label>
                                        <input type="text" name="kode_jurusan" id="kode_jurusan"
                                            class="form-control @error('kode_jurusan') is-invalid @enderror"
                                            value="{{ old('kode_jurusan', $jurusan->kode_jurusan) }}">
                                        @error('kode_jurusan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jurusan">Nama Jurusan</label>
                                        <input type="text" name="nama_jurusan" id="nama_jurusan"
                                            class="form-control @error('nama_jurusan') is-invalid @enderror"
                                            value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}">
                                        @error('nama_jurusan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('jurusan.index') }}" class="btn btn-warning">
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
