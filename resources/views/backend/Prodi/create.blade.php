@extends('template.index')
@section('title', 'Add Program Studi')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Program Studi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('prodi.index') }}">Data Program Studi</a></div>
                    <div class="breadcrumb-item">Form Prodi</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('prodi.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Program Studi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_prodi">Kode Program Studi</label>
                                        <input type="text" id="kode_prodi" name="kode_prodi"
                                            class="form-control @error('kode_prodi') is-invalid @enderror"
                                            value="{{ old('kode_prodi') }}" placeholder=".">
                                        @error('kode_prodi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_prodi">Nama Program Studi</label>
                                        <input type="text" id="nama_prodi" name="nama_prodi"
                                            class="form-control @error('nama_prodi') is-invalid @enderror"
                                            value="{{ old('nama_prodi') }}" placeholder=".">
                                        @error('nama_prodi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan_id">Nama Jurusan</label>
                                        <select id="jurusan_id" name="jurusan_id"
                                            class="form-control @error('jurusan_id') is-invalid @enderror">
                                            <option value="jurusan_id">Pilih Jurusan</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id_jurusan }}">
                                                    {{ $item->nama_jurusan }}</option>
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('jurusan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('jurusan.index') }}" class="btn btn-warning">
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
