@extends('template.index')
@section('title', 'Add Kelas')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kelas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('kelas.index') }}">Data Kelas</a></div>
                    <div class="breadcrumb-item">Form Kelas</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" action="{{ route('kelas.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Kelas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_kelas">Kode Kelas</label>
                                        <input type="text" id="kode_kelas" name="kode_kelas"
                                            class="form-control @error('kode_kelas') is-invalid @enderror"
                                            value="{{ old('kode_kelas') }}" placeholder=".">
                                        @error('kode_kelas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_kelas">Nama Kelas</label>
                                        <input type="text" id="nama_kelas" name="nama_kelas"
                                            class="form-control @error('nama_kelas') is-invalid @enderror"
                                            value="{{ old('nama_kelas') }}" placeholder=".">
                                        @error('nama_kelas')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="prodi_id">Program Studi</label>
                                        <select id="prodi_id" name="prodi_id"
                                            class="form-control @error('prodi_id') is-invalid @enderror">
                                            <option value="">Pilih Program Studi</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->id_prodi }}">
                                                    {{ $item->nama_prodi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('prodi_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="smt_thnakd_id">Semester</label>
                                        <select id="smt_thnakd_id" name="smt_thnakd_id"
                                            class="form-control @error('smt_thnakd_id') is-invalid @enderror">
                                            <option value="">Pilih Semester</option>
                                            @foreach ($smt_thnakd as $item)
                                                <option value="{{ $item->id_smt_thnakd }}">{{ $item->nama_smt_thnakd }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('smt_thnakd_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('kelas.index') }}" class="btn btn-warning">
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
