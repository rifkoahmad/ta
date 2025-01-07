@extends('template.index')
@section('title', 'Add Jurusan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Jurusan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('jurusan.index') }}">Data Jurusan</a></div>
                    <div class="breadcrumb-item">Form Jurusan</div>
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
                                action="{{ route('jurusan.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Jurusan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_jurusan">Kode Jurusan</label>
                                        <input type="text" id="kode_jurusan" name="kode_jurusan"
                                            class="form-control @error('kode_jurusan') is-invalid @enderror"
                                            value="{{ old('kode_jurusan') }}" placeholder=".">
                                        @error('kode_jurusan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jurusan">Nama Jurusan</label>
                                        <input type="text" id="nama_jurusan" name="nama_jurusan"
                                            class="form-control @error('nama_jurusan') is-invalid @enderror"
                                            value="{{ old('nama_jurusan') }}" placeholder=".">
                                        @error('nama_jurusan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('jurusan.index') }}" class="btn btn-warning">
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
