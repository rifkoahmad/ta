@extends('template.index')
@section('title', 'Add Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tempat-pkl.index') }}">Data Tempat PKL</a></div>
                    <div class="breadcrumb-item">Form Tempat PKL</div>
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
                                action="{{ route('tempat-pkl.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Tempat PKL</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_tempat_pkl">Nama Tempat PKL</label>
                                        <input type="text" id="nama_tempat_pkl" name="nama_tempat_pkl"
                                            class="form-control @error('nama_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('nama_tempat_pkl') }}" placeholder=".">
                                        @error('nama_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('tempat-pkl.index') }}" class="btn btn-warning">
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
