@extends('template.index')
@section('title', 'Add PKL Mahasiswa')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pkl-mahasiswa.index') }}">Data PKL Mahasiswa</a></div>
                    <div class="breadcrumb-item">Form PKL Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('pkl-mahasiswa.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah PKL Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="usulan_id">Mahasiswa</label>
                                        <select id="usulan_tempat_pkl_id" name="usulan_tempat_pkl_id"
                                            class="form-control @error('usulan_tempat_pkl_id') is-invalid @enderror">
                                            <option value="">-</option>
                                            @foreach ($usulan as $item)
                                                <option value="{{ $item->id_usulan }}">
                                                    {{ $item->mahasiswa->nama_mahasiswa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('usulan_tempat_pkl_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="pembimbing_id">Pembimbing</label>
                                        <select id="pembimbing_id" name="pembimbing_id"
                                            class="form-control @error('pembimbing_id') is-invalid @enderror">
                                            <option value="">-</option>
                                            @foreach ($pembimbing as $item)
                                                <option value="{{ $item->id_dosen }}">
                                                    {{ $item->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('pembimbing_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="penguji_id">Penguji</label>
                                        <select id="penguji_id" name="penguji_id"
                                            class="form-control @error('penguji_id') is-invalid @enderror">
                                            <option value="">-</option>
                                            @foreach ($penguji as $item)
                                                <option value="{{ $item->id_dosen }}">
                                                    {{ $item->nama_dosen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('penguji_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <input type="hidden" id="status_ver_pkl" name="status_ver_pkl" value="2">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('pkl-mahasiswa.index') }}" class="btn btn-warning">
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
