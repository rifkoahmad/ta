@extends('template.index')
@section('title', 'Add Sesi')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sesi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sesi.index') }}">Data Sesi</a></div>
                    <div class="breadcrumb-item">Form Sesi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('sesi.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Sesi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="periode_sesi">Periode Sesi</label>
                                        <input type="text" id="periode_sesi" name="periode_sesi"
                                            class="form-control @error('periode_sesi') is-invalid @enderror"
                                            value="{{ old('periode_sesi') }}" placeholder=".">
                                        @error('periode_sesi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('sesi.index') }}" class="btn btn-warning">
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
