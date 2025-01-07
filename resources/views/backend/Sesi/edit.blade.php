@extends('template.index')
@section('title', 'Edit Sesi ')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Sesi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('sesi.index') }}">Data Sesi</a></div>
                    <div class="breadcrumb-item">Edit Sesi</div>
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
                                <h4>Edit Sesi</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('sesi.update', $sesi->id_sesi) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="periode_sesi">Periode Sesi</label>
                                        <input type="text" name="periode_sesi" id="periode_sesi"
                                            class="form-control @error('periode_sesi') is-invalid @enderror"
                                            value="{{ old('periode_sesi', $sesi->periode_sesi) }}">
                                        @error('periode_sesi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Save Changes
                                        </button>
                                        <a href="{{ route('sesi.index') }}" class="btn btn-warning">
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
