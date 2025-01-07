@extends('template.index')
@section('title', 'Edit Sempro Nilai')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Sempro Nilai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sempro-nilai-penguji.index') }}">Data PKL Sempro Nilai</a></div>
                    <div class="breadcrumb-item">Edit Sempro Nilai</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('sempro-nilai-penguji.update', $semproNilai->id_sempro_nilai) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Sempro Nilai</h4>
                                </div>
                                <div class="card-body">
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
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('sempro-nilai-penguji.index') }}" class="btn btn-warning">
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
