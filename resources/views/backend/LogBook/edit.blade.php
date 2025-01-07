@extends('template.index')
@section('title', 'Edit Log Book PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Log Book PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('logbook.index') }}">Data Log Book PKL</a></div>
                    <div class="breadcrumb-item">Edit Log Book PKL</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('logbook.update', $logbook->id_log_book_pkl) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Log Book PKL</h4>
                                </div>
                                <div class="card-body">
                                    <!-- PKL Mahasiswa -->
                                    <div class="form-group">
                                        <label for="pkl_mahasiswa_id">PKL Mahasiswa</label>
                                        <select id="pkl_mahasiswa_id" name="pkl_mahasiswa_id"
                                            class="form-control @error('pkl_mahasiswa_id') is-invalid @enderror">
                                            <option value="">Pilih Mahasiswa PKL</option>
                                            @foreach ($pkl_mahasiswa as $item)
                                                <option value="{{ $item->id_pkl_mahasiswa }}"
                                                    {{ $item->id_pkl_mahasiswa == $logbook->pkl_mahasiswa_id ? 'selected' : '' }}>
                                                    {{ $item->usulan->mahasiswa->nama_mahasiswa }}</option>
                                            @endforeach
                                        </select>
                                        @error('pkl_mahasiswa_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Kegiatan --}}
                                    <div class="form-group">
                                        <label for="kegiatan">Kegiatan</label>
                                        <textarea id="kegiatan" name="kegiatan" class="form-control @error('komentar') is-invalid @enderror">{{ old('kegiatan', $logbook->kegiatan) }}</textarea>
                                        @error('kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Awal Kegiatan -->
                                    <div class="form-group">
                                        <label for="tgl_awal_kegiatan">Tanggal Awal Kegiatan</label>
                                        <input type="date" id="tgl_awal_kegiatan" name="tgl_awal_kegiatan"
                                            class="form-control @error('tgl_awal_kegiatan') is-invalid @enderror"
                                            value="{{ old('tgl_awal_kegiatan', $logbook->tgl_awal_kegiatan) }}">
                                        @error('tgl_awal_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Tanggal Akhir Kegiatan -->
                                    <div class="form-group">
                                        <label for="tgl_akhir_kegiatan">Tanggal Akhir Kegiatan</label>
                                        <input type="date" id="tgl_akhir_kegiatan" name="tgl_akhir_kegiatan"
                                            class="form-control @error('tgl_akhir_kegiatan') is-invalid @enderror"
                                            value="{{ old('tgl_akhir_kegiatan', $logbook->tgl_akhir_kegiatan) }}">
                                        @error('tgl_akhir_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Dokumen Laporan -->
                                    <div class="form-group">
                                        <label for="dokumen_laporan">Dokumen Laporan</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input @error('dokumen_laporan') is-invalid @enderror"
                                                id="dokumen_laporan" name="dokumen_laporan">
                                            <label class="custom-file-label" for="dokumen_laporan">
                                                {{ $logbook->dokumen_laporan ? $logbook->dokumen_laporan : 'Choose file' }}
                                            </label>
                                        </div>
                                        @error('dokumen_laporan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Script JavaScript -->
                                    <script>
                                        document.querySelectorAll('.custom-file-input').forEach((input) => {
                                            input.addEventListener('change', function(e) {
                                                var fileName = e.target.files[0]?.name || "Choose file";
                                                e.target.nextElementSibling.innerText = fileName;
                                            });
                                        });
                                    </script>

                                    <!-- Status -->
                                    <div>
                                        <input type="hidden" id="status" name="status" value="1">
                                    </div>

                                    <!-- Komentar (Hidden) -->
                                    <div class="form-group" style="display: none;">
                                        <label for="komentar">Komentar</label>
                                        <textarea id="komentar" name="komentar" class="form-control @error('komentar') is-invalid @enderror">{{ old('komentar', $logbook->komentar) }}</textarea>
                                        @error('komentar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('logbook.index') }}" class="btn btn-warning">
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
