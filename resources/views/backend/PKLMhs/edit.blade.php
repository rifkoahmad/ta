@extends('template.index')
@section('title', 'Edit Usulan Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Usulan Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('usulan-pkl.index') }}">Data Usulan Tempat PKL</a></div>
                    <div class="breadcrumb-item">Edit Usulan Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('pkl-mhs.update', $pklMahasiswa->id_pkl_mahasiswa) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Update Usulan Tempat PKL</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="judul_laporan">Judul Laporan</label>
                                        <input type="text" id="judul_laporan" name="judul_laporan"
                                            class="form-control @error('judul_laporan') is-invalid @enderror"
                                            value="{{ old('judul_laporan', $pklMahasiswa->judul_laporan) }}"
                                            placeholder="Masukkan Judul Laporan">
                                        @error('judul_laporan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="pembimbing_pkl">Pembimbing PKL</label>
                                        <input type="text" id="pembimbing_pkl" name="pembimbing_pkl"
                                            class="form-control @error('pembimbing_pkl') is-invalid @enderror"
                                            value="{{ old('pembimbing_pkl', $pklMahasiswa->pembimbing_pkl) }}"
                                            placeholder="Masukkan Nama Pembimbing PKL">
                                        @error('pembimbing_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="file_nilai">File Nilai</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_nilai') is-invalid @enderror"
                                                id="file_nilai" name="file_nilai">
                                            <label class="custom-file-label" for="file_nilai">
                                                {{ $pklMahasiswa->file_nilai ? $pklMahasiswa->file_nilai : 'Choose file' }}
                                            </label>
                                        </div>
                                        @if ($pklMahasiswa->file_nilai)
                                            <small>File saat ini: <a
                                                    href="{{ asset('storage/' . $pklMahasiswa->file_nilai) }}"
                                                    target="_blank">{{ $pklMahasiswa->file_nilai }}</a></small>
                                        @endif
                                        @error('file_nilai')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="file_laporan">File Laporan</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_laporan') is-invalid @enderror"
                                                id="file_laporan" name="file_laporan">
                                            <label class="custom-file-label" for="file_laporan">
                                                {{ $pklMahasiswa->file_laporan ? $pklMahasiswa->file_laporan : 'Choose file' }}
                                            </label>
                                        </div>
                                        @if ($pklMahasiswa->file_laporan)
                                            <small>File saat ini: <a
                                                    href="{{ asset('storage/' . $pklMahasiswa->file_laporan) }}"
                                                    target="_blank">{{ $pklMahasiswa->file_laporan }}</a></small>
                                        @endif
                                        @error('file_laporan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nilai_industri">Nilai Industri</label>
                                        <input type="number" id="nilai_industri" name="nilai_industri"
                                            class="form-control @error('nilai_industri') is-invalid @enderror"
                                            value="{{ old('nilai_industri', $pklMahasiswa->nilai_industri) }}"
                                            placeholder="Masukkan Nilai Industri">
                                        @error('nilai_industri')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <script>
                                        document.querySelectorAll('.custom-file-input').forEach((input) => {
                                            input.addEventListener('change', function(e) {
                                                var fileName = e.target.files[0]?.name || "Choose file";
                                                e.target.nextElementSibling.innerText = fileName;
                                            });
                                        });
                                    </script>

                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('pkl-mhs.index') }}" class="btn btn-warning">
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
