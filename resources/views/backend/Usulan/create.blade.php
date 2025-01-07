@extends('template.index')
@section('title', 'Add Usulan Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Usulan Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('usulan-pkl.index') }}">Data Usulan Tempat PKL</a>
                    </div>
                    <div class="breadcrumb-item">Form Usulan Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('usulan-pkl.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Usulan Tempat PKL</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tempat_pkl_id">Tempat PKL</label>
                                        <select id="tempat_pkl_id" name="tempat_pkl_id"
                                            class="form-control @error('tempat_pkl_id') is-invalid @enderror">
                                            <option value="">Pilih Tempat PKL</option>
                                            @foreach ($tempat_pkl as $item)
                                                <option value="{{ $item->id_tempat_pkl }}">{{ $item->nama_tempat_pkl }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tempat_pkl_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                                            class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                            value="{{ old('nama_mahasiswa') }}" placeholder="Masukkan Nama Mahasiswa">
                                        @error('nama_mahasiswa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="role_tempat_pkl_id">Role Tempat PKL</label>
                                        <select id="role_tempat_pkl_id" name="role_tempat_pkl_id"
                                            class="form-control @error('role_tempat_pkl_id') is-invalid @enderror">
                                            <option value="">Pilih Role</option>
                                            @foreach ($role_tempat_pkl as $role)
                                                <option value="{{ $role->id_role_tempat_pkl }}">{{ $role->nama_role }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('role_tempat_pkl_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- upload file (idnya: 'file_usulan') --}}
                                    <div class="form-group">
                                        <label for="file_usulan">Upload File Usulan</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('file_usulan') is-invalid @enderror"
                                                id="file_usulan" name="file_usulan">
                                            <label class="custom-file-label" for="file_usulan">Choose file</label>
                                        </div>
                                        @error('file_usulan')
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

                                    <input type="hidden" id="komentar" name="komentar" value="-">

                                    {{-- <div class="form-group">
                                        <label for="komentar">Komentar</label>
                                        <textarea id="komentar" name="komentar" class="form-control @error('komentar') is-invalid @enderror"
                                            placeholder="Tulis komentar">{{ old('komentar') }}</textarea>
                                        @error('komentar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="alamat_tempat_pkl">Alamat Tempat PKL</label>
                                        <input type="text" id="alamat_tempat_pkl" name="alamat_tempat_pkl"
                                            class="form-control @error('alamat_tempat_pkl') is-invalid @enderror"
                                            value="{{ old('alamat_tempat_pkl') }}"
                                            placeholder="Masukkan alamat tempat PKL">
                                        @error('alamat_tempat_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kota_perusahaan">Kota Perusahaan</label>
                                        <input type="text" id="kota_perusahaan" name="kota_perusahaan"
                                            class="form-control @error('kota_perusahaan') is-invalid @enderror"
                                            value="{{ old('kota_perusahaan') }}" placeholder="Masukkan kota perusahaan">
                                        @error('kota_perusahaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_awal_pkl">Tanggal Awal PKL</label>
                                        <input type="date" id="tgl_awal_pkl" name="tgl_awal_pkl"
                                            class="form-control @error('tgl_awal_pkl') is-invalid @enderror"
                                            value="{{ old('tgl_awal_pkl') }}">
                                        @error('tgl_awal_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_akhir_pkl">Tanggal Akhir PKL</label>
                                        <input type="date" id="tgl_akhir_pkl" name="tgl_akhir_pkl"
                                            class="form-control @error('tgl_akhir_pkl') is-invalid @enderror"
                                            value="{{ old('tgl_akhir_pkl') }}">
                                        @error('tgl_akhir_pkl')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <input type="hidden" id="status_usulan" name="status_usulan" value="1">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="status_usulan">Status Usulan</label>
                                        <select id="status_usulan" name="status_usulan"
                                            class="form-control @error('status_usulan') is-invalid @enderror">
                                            <option value="">Pilih Status</option>
                                            <option value="1" {{ old('status_usulan') == '1' ? 'selected' : '' }}>Diproses</option>
                                            <option value="2" {{ old('status_usulan') == '2' ? 'selected' : '' }}>Ditolak</option>
                                            <option value="3" {{ old('status_usulan') == '3' ? 'selected' : '' }}>Diterima</option>
                                        </select>
                                        @error('status_usulan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('usulan-pkl.index') }}" class="btn btn-warning">
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
