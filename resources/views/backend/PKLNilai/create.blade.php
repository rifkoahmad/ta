@extends('template.index')
@section('title', 'Add PKL Nilai')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Nilai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pkl-nilai.index') }}">Data PKL Nilai</a></div>
                    <div class="breadcrumb-item">Form PKL Nilai</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('pkl-nilai.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah PKL Nilai</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Field pkl_mahasiswa_id -->
                                    <div class="form-group">
                                        <label for="pkl_mahasiswa_id">Nama Mahasiswa</label>
                                        <select id="pkl_mahasiswa_id" name="pkl_mahasiswa_id" class="form-control">
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($pkl_mahasiswa as $item)
                                                <option value="{{ $item->id_pkl_mahasiswa }}">
                                                    {{ $item->usulan->mahasiswa->nama_mahasiswa }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Field dosen_id -->
                                    <div class="form-group">
                                        <label for="dosen_id">Nama Dosen</label>
                                        <select id="dosen_id" name="dosen_id" class="form-control">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($dosen as $item)
                                                <option value="{{ $item->id_dosen }}">{{ $item->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Fields nilai -->
                                    <div class="form-group">
                                        <label for="bahasa">Bahasa</label>
                                        <input type="number" id="bahasa" name="bahasa"
                                            class="form-control @error('bahasa') is-invalid @enderror"
                                            value="{{ old('bahasa') }}" placeholder="Nilai Bahasa" min="0"
                                            max="100">
                                        @error('bahasa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="analisis">Analisis</label>
                                        <input type="number" id="analisis" name="analisis"
                                            class="form-control @error('analisis') is-invalid @enderror"
                                            value="{{ old('analisis') }}" placeholder="Nilai Analisis" min="0"
                                            max="100">
                                        @error('analisis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sikap">Sikap</label>
                                        <input type="number" id="sikap" name="sikap"
                                            class="form-control @error('sikap') is-invalid @enderror"
                                            value="{{ old('sikap') }}" placeholder="Nilai Sikap" min="0"
                                            max="100">
                                        @error('sikap')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="komunikasi">Komunikasi</label>
                                        <input type="number" id="komunikasi" name="komunikasi"
                                            class="form-control @error('komunikasi') is-invalid @enderror"
                                            value="{{ old('komunikasi') }}" placeholder="Nilai Komunikasi" min="0"
                                            max="100">
                                        @error('komunikasi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="penyajian">Penyajian</label>
                                        <input type="number" id="penyajian" name="penyajian"
                                            class="form-control @error('penyajian') is-invalid @enderror"
                                            value="{{ old('penyajian') }}" placeholder="Nilai Penyajian" min="0"
                                            max="100">
                                        @error('penyajian')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="penguasaan">Penguasaan</label>
                                        <input type="number" id="penguasaan" name="penguasaan"
                                            class="form-control @error('penguasaan') is-invalid @enderror"
                                            value="{{ old('penguasaan') }}" placeholder="Nilai Penguasaan" min="0"
                                            max="100">
                                        @error('penguasaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field sebagai -->
                                    <div class="form-group">
                                        <label for="sebagai">Sebagai</label>
                                        <select id="sebagai" name="sebagai"
                                            class="form-control @error('sebagai') is-invalid @enderror">
                                            <option value="">Pilih Peran</option>
                                            <option value="pembimbing">Pembimbing</option>
                                            <option value="penguji">Penguji</option>
                                        </select>
                                        @error('sebagai')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('pkl-nilai.index') }}" class="btn btn-warning">
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
