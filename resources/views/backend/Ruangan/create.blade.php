@extends('template.index')
@section('title', 'Add Ruangan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Ruangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ruangan.index') }}">Data Ruangan</a></div>
                    <div class="breadcrumb-item">Form Ruangan</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('ruangan.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Ruangan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_ruangan">Kode Ruangan</label>
                                        <input type="text" id="kode_ruangan" name="kode_ruangan"
                                            class="form-control @error('kode_ruangan') is-invalid @enderror"
                                            value="{{ old('kode_ruangan') }}" placeholder=".">
                                        @error('kode_ruangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('ruangan.index') }}" class="btn btn-warning">
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
