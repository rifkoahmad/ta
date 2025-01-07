@extends('template.index')
@section('title', 'Edit Jabatan Pimpinan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Jabatan Pimpinan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('jabatan-pimpinan.index') }}">Data Jabatan Pimpinan</a>
                    </div>
                    <div class="breadcrumb-item">Edit Jabatan Pimpinan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('jabatan-pimpinan.update', $jabatanPimpinan->id_jabatan_pimpinan) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Data Jabatan Pimpinan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_jabatan_pimpinan">Kode Jabatan Pimpinan</label>
                                        <input type="text" id="kode_jabatan_pimpinan" name="kode_jabatan_pimpinan"
                                            class="form-control @error('kode_jabatan_pimpinan') is-invalid @enderror"
                                            value="{{ old('kode_jabatan_pimpinan', $jabatanPimpinan->kode_jabatan_pimpinan) }}"
                                            placeholder="Masukkan Kode Jabatan">
                                        @error('kode_jabatan_pimpinan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jabatan_pimpinan">Nama Jabatan Pimpinan</label>
                                        <input type="text" id="nama_jabatan_pimpinan" name="nama_jabatan_pimpinan"
                                            class="form-control @error('nama_jabatan_pimpinan') is-invalid @enderror"
                                            value="{{ old('nama_jabatan_pimpinan', $jabatanPimpinan->nama_jabatan_pimpinan) }}"
                                            placeholder="Masukkan Nama Jabatan">
                                        @error('nama_jabatan_pimpinan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('jabatan-pimpinan.index') }}" class="btn btn-warning">
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
