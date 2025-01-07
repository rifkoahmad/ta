@extends('template.index')
@section('title', 'Edit Sempro Nilai')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Sempro Nilai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sempro-nilai.index') }}">Data PKL Sempro Nilai</a></div>
                    <div class="breadcrumb-item">Edit Sempro Nilai</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('sempro-nilai.update', $semproNilai->id_sempro_nilai) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Sempro Nilai</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Field sempro_mhs_id -->
                                    <div class="form-group">
                                        <label for="sempro_mhs_id">Nama Mahasiswa</label>
                                        <select id="sempro_mhs_id" name="sempro_mhs_id"
                                            class="form-control @error('sempro_mhs_id') is-invalid @enderror">
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($sempro_mhs as $item)
                                                <option value="{{ $item->id_sempro_mhs }}"
                                                    {{ $item->id_sempro_mhs == $semproNilai->sempro_mhs_id ? 'selected' : '' }}>
                                                    {{ $item->mahasiswa->nama_mahasiswa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sempro_mhs_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field dosen_id -->
                                    <div class="form-group">
                                        <label for="dosen_id">Nama Dosen</label>
                                        <select id="dosen_id" name="dosen_id"
                                            class="form-control @error('dosen_id') is-invalid @enderror">
                                            <option value="">Pilih Dosen</option>
                                            @foreach ($dosen as $item)
                                                <option value="{{ $item->id_dosen }}"
                                                    {{ $item->id_dosen == $semproNilai->dosen_id ? 'selected' : '' }}>
                                                    {{ $item->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('dosen_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Fields nilai -->

                                    @php
                                        $nilai = json_decode($semproNilai->nilai, true);
                                    @endphp

                                    <div class="form-group">
                                        <label for="pendahuluan">Pendahuluan</label>
                                        <input type="number" id="pendahuluan" name="pendahuluan"
                                            class="form-control @error('pendahuluan') is-invalid @enderror"
                                            value="{{ old('pendahuluan', $nilai['pendahuluan'] ?? '') }}"
                                            placeholder="Nilai Pendahuluan" min="0" max="100">
                                        @error('pendahuluan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tinjauan_pustaka">Tinjauan Pustaka</label>
                                        <input type="number" id="tinjauan_pustaka" name="tinjauan_pustaka"
                                            class="form-control @error('tinjauan_pustaka') is-invalid @enderror"
                                            value="{{ old('tinjauan_pustaka', $nilai['tinjauan_pustaka'] ?? '') }}"
                                            placeholder="Nilai Tinjauan Pustaka" min="0" max="100">
                                        @error('tinjauan_pustaka')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="metodologi_penelitian">Metodologi Penelitian</label>
                                        <input type="number" id="metodologi_penelitian" name="metodologi_penelitian"
                                            class="form-control @error('metodologi_penelitian') is-invalid @enderror"
                                            value="{{ old('metodologi_penelitian', $nilai['metodologi_penelitian'] ?? '') }}"
                                            placeholder="Nilai Metodologi Penelitian" min="0" max="100">
                                        @error('metodologi_penelitian')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="bahasa_dan_tata_tulis">Bahasa & Tata Tulis</label>
                                        <input type="number" id="bahasa_dan_tata_tulis" name="bahasa_dan_tata_tulis"
                                            class="form-control @error('bahasa_dan_tata_tulis') is-invalid @enderror"
                                            value="{{ old('bahasa_dan_tata_tulis', $nilai['bahasa_dan_tata_tulis'] ?? '') }}"
                                            placeholder="Nilai Bahasa & Tata Tulis" min="0" max="100">
                                        @error('bahasa_dan_tata_tulis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="presentasi">Presentasi</label>
                                        <input type="number" id="presentasi" name="presentasi"
                                            class="form-control @error('presentasi') is-invalid @enderror"
                                            value="{{ old('presentasi', $nilai['presentasi'] ?? '') }}"
                                            placeholder="Nilai Presentasi" min="0" max="100">
                                        @error('presentasi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Field sebagai -->
                                    <div class="form-group">
                                        <label for="sebagai">Sebagai</label>
                                        <select id="sebagai" name="sebagai"
                                            class="form-control @error('sebagai') is-invalid @enderror">
                                            <option value="">Pilih Peran</option>
                                            <option value="pembimbing_1"
                                                {{ old('sebagai', $semproNilai->sebagai) == 'pembimbing_1' ? 'selected' : '' }}>
                                                Pembimbing 1</option>
                                            <option value="pembimbing_2"
                                                {{ old('sebagai', $semproNilai->sebagai) == 'pembimbing_2' ? 'selected' : '' }}>
                                                Pembimbing 2</option>
                                            <option value="penguji"
                                                {{ old('sebagai', $semproNilai->sebagai) == 'penguji' ? 'selected' : '' }}>
                                                Penguji</option>
                                        </select>
                                        @error('sebagai')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('sempro-nilai.index') }}" class="btn btn-warning">
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
