@extends('template.index')
@section('title', 'Edit Data Sempro Mahasiswa Kap')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Sempro Mahasiswa Kap</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sempro-mhs-kap.index') }}">Data Sempro Mahasiswa Kap</a>
                    </div>
                    <div class="breadcrumb-item">Edit Data Sempro Mahasiswa Kap</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form" method="POST" enctype="multipart/form-data"
                                action="{{ route('sempro-mhs-kap.update', $sempro->id_sempro_mhs) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Form Edit Sempro Mahasiswa</h4>
                                </div>
                                <div class="card-body">

                                    <!-- Pembimbing 1 -->
                                    <div class="form-group">
                                        <label for="pembimbing_1_id">Pembimbing 1</label>
                                        <select id="pembimbing_1_id" name="pembimbing_1_id"
                                            class="form-control @error('pembimbing_1_id') is-invalid @enderror">
                                            <option value="">Pilih Pembimbing 1</option>
                                            @foreach ($dosen as $dosen1)
                                                <option value="{{ $dosen1->id_dosen }}"
                                                    {{ old('pembimbing_1_id', $sempro->pembimbing_1_id) == $dosen1->id_dosen ? 'selected' : '' }}>
                                                    {{ $dosen1->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pembimbing_1_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Pembimbing 2 -->
                                    <div class="form-group">
                                        <label for="pembimbing_2_id">Pembimbing 2</label>
                                        <select id="pembimbing_2_id" name="pembimbing_2_id"
                                            class="form-control @error('pembimbing_2_id') is-invalid @enderror">
                                            <option value="">Pilih Pembimbing 2</option>
                                            @foreach ($dosen as $dosen2)
                                                <option value="{{ $dosen2->id_dosen }}"
                                                    {{ old('pembimbing_2_id', $sempro->pembimbing_2_id) == $dosen2->id_dosen ? 'selected' : '' }}>
                                                    {{ $dosen2->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pembimbing_2_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Penguji -->
                                    <div class="form-group">
                                        <label for="penguji_id">Penguji</label>
                                        <select id="penguji_id" name="penguji_id"
                                            class="form-control @error('penguji_id') is-invalid @enderror">
                                            <option value="">Pilih Penguji</option>
                                            @foreach ($dosen as $penguji)
                                                <option value="{{ $penguji->id_dosen }}"
                                                    {{ old('penguji_id', $sempro->penguji_id) == $penguji->id_dosen ? 'selected' : '' }}>
                                                    {{ $penguji->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penguji_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status Verifikasi -->
                                    <div class="form-group">
                                        <label for="status_ver_sempro">Status Verifikasi</label>
                                        <select id="status_ver_sempro" name="status_ver_sempro"
                                            class="form-control @error('status_ver_sempro') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_ver_sempro', $sempro->status_ver_sempro) == '1' ? 'selected' : '' }}>
                                                Approve</option>
                                            <option value="2"
                                                {{ old('status_ver_sempro', $sempro->status_ver_sempro) == '2' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="3"
                                                {{ old('status_ver_sempro', $sempro->status_ver_sempro) == '3' ? 'selected' : '' }}>
                                                Rejected</option>
                                        </select>
                                        @error('status_ver_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status Judul -->
                                    <div class="form-group">
                                        <label for="status_judul_sempro">Status Judul Sempro</label>
                                        <select id="status_judul_sempro" name="status_judul_sempro"
                                            class="form-control @error('status_judul_sempro') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_judul_sempro', $sempro->status_judul_sempro) == '1' ? 'selected' : '' }}>
                                                Approve</option>
                                            <option value="2"
                                                {{ old('status_judul_sempro', $sempro->status_judul_sempro) == '2' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="3"
                                                {{ old('status_judul_sempro', $sempro->status_judul_sempro) == '3' ? 'selected' : '' }}>
                                                Rejected</option>
                                        </select>
                                        @error('status_judul_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status Sempro -->
                                    <div class="form-group">
                                        <label for="status_sempro">Status Sempro</label>
                                        <select id="status_sempro" name="status_sempro"
                                            class="form-control @error('status_sempro') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_sempro', $sempro->status_sempro) == '1' ? 'selected' : '' }}>
                                                Complete</option>
                                            <option value="2"
                                                {{ old('status_sempro', $sempro->status_sempro) == '2' ? 'selected' : '' }}>
                                                In Progress</option>
                                        </select>
                                        @error('status_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Komentar -->
                                    <div class="form-group">
                                        <label for="komentar">Komentar</label>
                                        <textarea id="komentar" name="komentar" class="form-control @error('komentar') is-invalid @enderror"
                                            placeholder="Tulis komentar">{{ old('komentar', $sempro->komentar) }}</textarea>
                                        @error('komentar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('sempro-mhs-kap.index') }}" class="btn btn-warning">
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
