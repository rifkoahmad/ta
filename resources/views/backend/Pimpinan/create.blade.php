@extends('template.index')
@section('title', 'Add Pimpinan')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pimpinan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pimpinan.index') }}">Data Pimpinan</a></div>
                    <div class="breadcrumb-item">Form Pimpinan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('pimpinan.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Pimpinan</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="dosen_id">Dosen</label>
                                        <select id="dosen_id" name="dosen_id"
                                            class="form-control @error('dosen_id') is-invalid @enderror">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($dosen as $item)
                                                <option value="{{ $item->id_dosen }}">{{ $item->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                        @error('dosen_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan_pimpinan_id">Jabatan</label>
                                        <select id="jabatan_pimpinan_id" name="jabatan_pimpinan_id"
                                            class="form-control @error('jabatan_pimpinan_id') is-invalid @enderror">
                                            <option value="">Pilih Jabatan</option>
                                            @foreach ($jabatan_pimpinan as $item)
                                                <option value="{{ $item->id_jabatan_pimpinan }}">
                                                    {{ $item->nama_jabatan_pimpinan }}</option>
                                            @endforeach
                                        </select>
                                        @error('jabatan_pimpinan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="jurusan_id">Jurusan</label>
                                        <select id="jurusan_id" name="jurusan_id"
                                            class="form-control @error('jurusan_id') is-invalid @enderror">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id_jurusan }}">{{ $item->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                        @error('jurusan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="periode">Periode</label>
                                        <input type="text" id="periode" name="periode"
                                            class="form-control @error('periode') is-invalid @enderror"
                                            value="{{ old('periode') }}" placeholder="Masukkan periode">
                                        @error('periode')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_pimpinan">Status Pimpinan</label>
                                        <select id="status_pimpinan" name="status_pimpinan"
                                            class="form-control @error('status_pimpinan') is-invalid @enderror">
                                            <option value="1" {{ old('status_pimpinan') == '1' ? 'selected' : '' }}>
                                                Aktif</option>
                                            <option value="0" {{ old('status_pimpinan') == '0' ? 'selected' : '' }}>
                                                Tidak Aktif</option>
                                        </select>
                                        @error('status_pimpinan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('pimpinan.index') }}" class="btn btn-warning">
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
