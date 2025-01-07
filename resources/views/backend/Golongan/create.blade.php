@extends('template.index')
@section('title', 'Add Golongan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Golongan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('golongan.index') }}">Data Golongan</a></div>
                    <div class="breadcrumb-item">Form Golongan</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Form Jurusan</h2>
                <p class="section-lead">
                    Data jurusan kampus vokasi Politeknik Negeri Padang
                </p> --}}

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('golongan.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Golongan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_golongan">Kode Golongan</label>
                                        <input type="text" id="kode_golongan" name="kode_golongan"
                                            class="form-control @error('kode_golongan') is-invalid @enderror"
                                            value="{{ old('kode_golongan') }}" placeholder=".">
                                        @error('kode_golongan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_golongan">Nama Golongan</label>
                                        <input type="text" id="nama_golongan" name="nama_golongan"
                                            class="form-control @error('nama_golongan') is-invalid @enderror"
                                            value="{{ old('nama_golongan') }}" placeholder=".">
                                        @error('nama_golongan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('golongan.index') }}" class="btn btn-warning">
                                        <i class="fas fa-arrow-left"></i> Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
