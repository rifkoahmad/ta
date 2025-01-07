@extends('template.index')
@section('title', 'Edit Data Sempro Mahasiswa')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Sempro Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sempro-mhs.index') }}">Data Sempro Mahasiswa</a></div>
                    <div class="breadcrumb-item">Edit Data Sempro Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form" method="POST" enctype="multipart/form-data"
                                action="{{ route('sempro-mhs.update', $sempro->id_sempro_mhs) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Form Edit Sempro Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Nama Mahasiswa -->
                                    {{-- <div class="form-group">
                                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                                            class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                            value="{{ old('nama_mahasiswa', $sempro->nama_mahasiswa) }}"
                                            placeholder="Masukkan Nama Mahasiswa">
                                        @error('nama_mahasiswa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <!-- Judul Sempro -->
                                    <div class="form-group">
                                        <label for="judul_sempro">Judul Sempro</label>
                                        <input type="text" id="judul_sempro" name="judul_sempro"
                                            class="form-control @error('judul_sempro') is-invalid @enderror"
                                            value="{{ old('judul_sempro', $sempro->judul_sempro) }}"
                                            placeholder="Masukkan Judul Seminar Proposal">
                                        @error('judul_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- File Sempro -->
                                    <div class="form-group">
                                        <label for="file_sempro">Upload File Sempro</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_sempro') is-invalid @enderror"
                                                id="file_sempro" name="file_sempro">
                                            <label class="custom-file-label"
                                                for="file_sempro">{{ $sempro->file_sempro ?? 'Choose file' }}</label>
                                        </div>
                                        @error('file_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Script JavaScript -->
                                    <script>
                                        document.querySelectorAll('.custom-file-input').forEach((input) => {
                                            input.addEventListener('change', function(e) {
                                                var fileName = e.target.files[0]?.name || "Choose file"; // Ambil nama file
                                                e.target.nextElementSibling.innerText = fileName; // Update label
                                            });
                                        });
                                    </script>

                                    <!-- Status Verifikasi -->
                                    <input type="hidden" name="status_ver_sempro" value="{{ $sempro->status_ver_sempro }}">

                                    <!-- Status Judul -->
                                    <input type="hidden" name="status_judul_sempro"
                                        value="{{ $sempro->status_judul_sempro }}">

                                    <!-- Status Sempro -->
                                    <input type="hidden" name="status_sempro" value="{{ $sempro->status_sempro }}">

                                    <!-- Komentar -->
                                    <input type="hidden" id="komentar" name="komentar" value="{{ $sempro->komentar }}">
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('sempro-mhs.index') }}" class="btn btn-warning">
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
