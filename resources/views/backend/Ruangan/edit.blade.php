@extends('template.index')
@section('title', 'Edit Ruangan ')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Ruangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('ruangan.index') }}">Data Ruangan</a></div>
                    <div class="breadcrumb-item">Edit Ruangan</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Edit Data Jurusan</h2>
                <p class="section-lead">
                    Perbarui data jurusan kampus vokasi Politeknik Negeri Padang.
                </p> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Ruangan</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('ruangan.update', $ruangan->id_ruangan) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="kode_ruangan">Kode Ruangan</label>
                                        <input type="text" name="kode_ruangan" id="kode_ruangan"
                                            class="form-control @error('kode_ruangan') is-invalid @enderror"
                                            value="{{ old('kode_ruangan', $ruangan->kode_ruangan) }}">
                                        @error('kode_ruangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('ruangan.index') }}" class="btn btn-warning">
                                            <i class="fas fa-arrow-left"></i> Back
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
