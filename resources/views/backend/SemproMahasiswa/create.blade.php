@extends('template.index')
@section('title', 'Tambah Data Sempro Mahasiswa')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Sempro Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sempro-mhs.index') }}">Data Sempro Mahasiswa</a></div>
                    <div class="breadcrumb-item">Form Tambah Sempro Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form" method="POST" enctype="multipart/form-data"
                                action="{{ route('sempro-mhs.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Form Tambah Sempro Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id_mahasiswa" value="{{$id_mahasiswa}}">

                                    <!-- Judul Sempro -->
                                    <div class="form-group">
                                        <label for="judul_sempro">Judul Sempro</label>
                                        <input type="text" id="judul_sempro" name="judul_sempro"
                                            class="form-control @error('judul_sempro') is-invalid @enderror"
                                            value="{{ old('judul_sempro') }}" placeholder="Masukkan Judul Seminar Proposal">
                                        @error('judul_sempro')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Pembimbing 1 -->
                                    {{-- <div class="form-group">
                                        <label for="pembimbing_1_id">Pembimbing 1</label>
                                        <select id="pembimbing_1_id" name="pembimbing_1_id"
                                            class="form-control @error('pembimbing_1_id') is-invalid @enderror">
                                            <option value="">Pilih Pembimbing 1</option>
                                            @foreach ($dosen as $dosen1)
                                                <option value="{{ $dosen1->id_dosen }}">{{ $dosen1->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                        @error('pembimbing_1_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <!-- Pembimbing 2 -->
                                    {{-- <div class="form-group">
                                        <label for="pembimbing_2_id">Pembimbing 2</label>
                                        <select id="pembimbing_2_id" name="pembimbing_2_id"
                                            class="form-control @error('pembimbing_2_id') is-invalid @enderror">
                                            <option value="">Pilih Pembimbing 2</option>
                                            @foreach ($dosen as $dosen2)
                                                <option value="{{ $dosen2->id_dosen }}">{{ $dosen2->nama_dosen }}</option>
                                            @endforeach
                                        </select>
                                        @error('pembimbing_2_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <!-- Penguji -->
                                    {{-- <div class="form-group">
                                        <label for="penguji_id">Penguji</label>
                                        <select id="penguji_id" name="penguji_id"
                                            class="form-control @error('penguji_id') is-invalid @enderror">
                                            <option value="">Pilih Penguji</option>
                                            @foreach ($dosen as $penguji)
                                                <option value="{{ $penguji->id_dosen }}">{{ $penguji->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penguji_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <!-- File Sempro -->
                                    <div class="form-group">
                                        <label for="file_sempro">Upload File Sempro</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_sempro') is-invalid @enderror"
                                                id="file_sempro" name="file_sempro">
                                            <label class="custom-file-label" for="file_sempro">Choose file</label>
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
                                    <input type="hidden" name="status_ver_sempro" value="2">

                                    <!-- Status Judul -->
                                    <input type="hidden" name="status_judul_sempro" value="2">

                                    <!-- Status Sempro -->
                                    <input type="hidden" name="status_sempro" value="2">

                                    <!-- Komentar -->
                                    <input type="hidden" name="komentar" value="-">
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
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
