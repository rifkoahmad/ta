@extends('template.index')
@section('title', 'Add Role Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('role-tempat-pkl.index') }}">Data Tempat PKL</a></div>
                    <div class="breadcrumb-item">Form Role Tempat PKL</div>
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
                                action="{{ route('role-tempat-pkl.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Role Tempat PKL</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_role">Role Tempat PKL</label>
                                        <input type="text" id="nama_role" name="nama_role"
                                            class="form-control @error('nama_role') is-invalid @enderror"
                                            value="{{ old('nama_role') }}" placeholder=".">
                                        @error('nama_role')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('role-tempat-pkl.index') }}" class="btn btn-warning">
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
