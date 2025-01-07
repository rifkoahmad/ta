@extends('template.index')
@section('title', 'Edit Role Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Role Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('role-tempat-pkl.index') }}">Data Role Tempat PKL</a></div>
                    <div class="breadcrumb-item">Edit Role Tempat PKL</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Role Tempat PKL</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('role-tempat-pkl.update', $roleTempatPKL->id_role_tempat_pkl) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="nama_role">Nama Role</label>
                                        <input type="text" name="nama_role" id="nama_role"
                                            class="form-control @error('nama_role') is-invalid @enderror"
                                            value="{{ old('nama_role', $roleTempatPKL->nama_role) }}"
                                            placeholder="Masukkan Nama Role">
                                        @error('nama_role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Simpan Perubahan
                                        </button>
                                        <a href="{{ route('role-tempat-pkl.index') }}" class="btn btn-warning">
                                            <i class="fas fa-arrow-left"></i> Kembali
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
