@extends('template.index')
@section('title', 'Edit Verifikasi Usulan Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Verifikasi Usulan Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('verifikasi-usulan-pkl.index') }}">Data Verifikasi Usulan
                            Tempat PKL</a></div>
                    <div class="breadcrumb-item">Edit Verifikasi Usulan Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('verifikasi-usulan-pkl.update', $usulanPKL->id_usulan) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Usulan Tempat PKL</h4>
                                </div>
                                <div class="card-body">

                                    <!-- Status Usulan -->
                                    <div class="form-group">
                                        <label for="status_usulan">Status Usulan</label>
                                        <select id="status_usulan" name="status_usulan"
                                            class="form-control @error('status_usulan') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_usulan', $usulanPKL->status_usulan) == '1' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="2"
                                                {{ old('status_usulan', $usulanPKL->status_usulan) == '2' ? 'selected' : '' }}>
                                                Ditolak
                                            </option>
                                            <option value="3"
                                                {{ old('status_usulan', $usulanPKL->status_usulan) == '3' ? 'selected' : '' }}>
                                                Diterima
                                            </option>
                                        </select>
                                        @error('status_usulan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Komentar -->
                                    <div class="form-group">
                                        <label for="komentar">Komentar</label>
                                        <textarea id="komentar" name="komentar" class="form-control @error('komentar') is-invalid @enderror"
                                            placeholder="Tulis komentar">{{ old('komentar', $usulanPKL->komentar) }}</textarea>
                                        @error('komentar')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
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
