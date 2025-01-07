@extends('template.index')
@section('title', 'Edit Golongan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Golongan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('golongan.index') }}">Data Golongan</a></div>
                    <div class="breadcrumb-item">Edit Golongan</div>
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
                                <form action="{{ route('golongan.update', $golongan->id_golongan) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="kode_golongan">Kode Golongan</label>
                                        <input type="text" name="kode_golongan" id="kode_golongan"
                                            class="form-control @error('kode_golongan') is-invalid @enderror"
                                            value="{{ old('kode_golongan', $golongan->kode_golongan) }}">
                                        @error('kode_golongan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_golongan">Nama Golongan</label>
                                        <input type="text" name="nama_golongan" id="nama_golongan"
                                            class="form-control @error('nama_golongan') is-invalid @enderror"
                                            value="{{ old('nama_golongan', $golongan->nama_golongan) }}">
                                        @error('nama_golongan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('golongan.index') }}" class="btn btn-warning">
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
