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
                                    <div class="form-group">
                                        <label for="kode_tempat_pkl">Kode Tempat PKL</label>
                                        <input type="text" id="kode_tempat_pkl" name="kode_tempat_pkl"
                                            placeholder="Tidak Wajib"
                                            class="form-control @error('kode_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('kode_tempat_pkl') }}" placeholder=".">
                                        @error('kode_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_tempat_pkl">Alamat Tempat PKL</label>
                                        <textarea id="alamat_tempat_pkl" name="alamat_tempat_pkl"
                                            class="form-control @error('alamat_tempat_pkl') is-invalid @enderror" placeholder=".">{{ old('alamat_tempat_pkl') }}</textarea>
                                        @error('alamat_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe_tempat_pkl">Tipe Tempat PKL</label>
                                        <select id="tipe_tempat_pkl" name="tipe_tempat_pkl"
                                            class="form-control @error('tipe_tempat_pkl') is-invalid @enderror">
                                            <option value="">Pilih Tipe</option>
                                            <option value="1" {{ old('tipe_tempat_pkl') == '1' ? 'selected' : '' }}>
                                                Perusahaan</option>
                                            <option value="2" {{ old('tipe_tempat_pkl') == '2' ? 'selected' : '' }}>
                                                Instansi</option>
                                            <option value="3" {{ old('tipe_tempat_pkl') == '3' ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                        @error('tipe_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="logo_tempat_pkl">Logo Tempat PKL</label>
                                        <input type="file" id="logo_tempat_pkl" name="logo_tempat_pkl"
                                            placeholder="Tidak Wajib"
                                            class="form-control @error('logo_tempat_pkl') is-invalid @enderror">
                                        @error('logo_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="detail_info_tempat_pkl">Detail Informasi Tempat PKL</label>
                                        <textarea id="detail_info_tempat_pkl" name="detail_info_tempat_pkl" placeholder="Tidak Wajib"
                                            class="form-control @error('detail_info_tempat_pkl') is-invalid @enderror" placeholder=".">{{ old('detail_info_tempat_pkl') }}</textarea>
                                        @error('detail_info_tempat_pkl')
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
