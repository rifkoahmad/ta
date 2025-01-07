@extends('template.index')
@section('title', 'Add Semester Tahun Akademik')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Semester Tahun Akademik</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('semester.index') }}">Data Semester Tahun Akademik</a>
                    </div>
                    <div class="breadcrumb-item">Form Semester Tahun Akademik</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('semester.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Data Semester Tahun Akademik</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_smt_thnakd">Kode Semester Tahun Akademik</label>
                                        <input type="text" id="kode_smt_thnakd" name="kode_smt_thnakd"
                                            class="form-control @error('kode_smt_thnakd') is-invalid @enderror"
                                            value="{{ old('kode_smt_thnakd') }}" placeholder=".">
                                        @error('kode_smt_thnakd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_smt_thnakd">Nama Semester Tahun Akademik</label>
                                        <input type="text" id="nama_smt_thnakd" name="nama_smt_thnakd"
                                            class="form-control @error('nama_smt_thnakd') is-invalid @enderror"
                                            value="{{ old('nama_smt_thnakd') }}" placeholder=".">
                                        @error('nama_smt_thnakd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status_smt_thnakd">Status</label>
                                        <select id="status_smt_thnakd" name="status_smt_thnakd"
                                            class="form-control @error('status_smt_thnakd') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_smt_thnakd', '1') == '1' ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ old('status_smt_thnakd') == '0' ? 'selected' : '' }}>
                                                Tidak Aktif</option>
                                        </select>
                                        @error('status_smt_thnakd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('semester.index') }}" class="btn btn-warning">
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
