@extends('template.index')
@section('title', 'Edit Log Book PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Log Book PKL Pembimbing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('logbook-pem.index') }}">Data Log Book PKL</a></div>
                    <div class="breadcrumb-item">Edit Log Book PKL Pembimbing</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('logbook-pem.update', $logbook->id_log_book_pkl) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Log Book PKL</h4>
                                </div>
                                <div class="card-body">

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" name="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status', $logbook->status) == '1' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="2"
                                                {{ old('status', $logbook->status) == '2' ? 'selected' : '' }}>
                                                Diverifikasi
                                            </option>
                                        </select>
                                        @error('status_usulan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Komentar --}}
                                    <div class="form-group">
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
