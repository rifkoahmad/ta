@extends('template.index')
@section('title', 'Edit Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('tempat-pkl.index') }}">Data Tempat PKL</a></div>
                    <div class="breadcrumb-item">Edit Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Tempat PKL</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tempat-pkl.update', $tempatPKL->id_tempat_pkl) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="nama_tempat_pkl">Nama Tempat PKL</label>
                                        <input type="text" name="nama_tempat_pkl" id="nama_tempat_pkl"
                                            class="form-control @error('nama_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('nama_tempat_pkl', $tempatPKL->nama_tempat_pkl) }}">
                                        @error('nama_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_tempat_pkl">Kode Tempat PKL</label>
                                        <input type="text" name="kode_tempat_pkl" id="kode_tempat_pkl"
                                            class="form-control @error('kode_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('kode_tempat_pkl', $tempatPKL->kode_tempat_pkl) }}">
                                        @error('kode_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_tempat_pkl">Alamat Tempat PKL</label>
                                        <textarea id="alamat_tempat_pkl" name="alamat_tempat_pkl"
                                            class="form-control @error('alamat_tempat_pkl') is-invalid @enderror">{{ old('alamat_tempat_pkl', $tempatPKL->alamat_tempat_pkl) }}</textarea>
                                        @error('alamat_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tipe_tempat_pkl">Tipe Tempat PKL</label>
                                        <select id="tipe_tempat_pkl" name="tipe_tempat_pkl"
                                            class="form-control @error('tipe_tempat_pkl') is-invalid @enderror">
                                            <option value="">Pilih Tipe</option>
                                            <option value="1"
                                                {{ old('tipe_tempat_pkl', $tempatPKL->tipe_tempat_pkl) == '1' ? 'selected' : '' }}>
                                                Perusahaan</option>
                                            <option value="2"
                                                {{ old('tipe_tempat_pkl', $tempatPKL->tipe_tempat_pkl) == '2' ? 'selected' : '' }}>
                                                Instansi</option>
                                            <option value="3"
                                                {{ old('tipe_tempat_pkl', $tempatPKL->tipe_tempat_pkl) == '3' ? 'selected' : '' }}>
                                                Lainnya</option>
                                        </select>
                                        @error('tipe_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="logo_tempat_pkl">Logo Tempat PKL</label>
                                        <input type="file" name="logo_tempat_pkl" id="logo_tempat_pkl"
                                            class="form-control @error('logo_tempat_pkl') is-invalid @enderror">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti
                                            logo.</small>
                                        @error('logo_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="detail_info_tempat_pkl">Detail Informasi Tempat PKL</label>
                                        <textarea id="detail_info_tempat_pkl" name="detail_info_tempat_pkl"
                                            class="form-control @error('detail_info_tempat_pkl') is-invalid @enderror">{{ old('detail_info_tempat_pkl', $tempatPKL->detail_info_tempat_pkl) }}</textarea>
                                        @error('detail_info_tempat_pkl')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('tempat-pkl.index') }}" class="btn btn-warning">
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
