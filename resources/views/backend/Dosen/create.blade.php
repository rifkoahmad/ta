@extends('template.index')
@section('title', 'Add Dosen')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dosen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('dosen.index') }}">Data Dosen</a></div>
                    <div class="breadcrumb-item">Form Dosen</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" action="{{ route('dosen.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Tambah Dosen</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nama_dosen">Nama Dosen</label>
                                        <input type="text" id="nama_dosen" name="nama_dosen"
                                            class="form-control @error('nama_dosen') is-invalid @enderror"
                                            value="{{ old('nama_dosen') }}" placeholder=".">
                                        @error('nama_dosen')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nidn_dosen">NIDN</label>
                                        <input type="text" id="nidn_dosen" name="nidn_dosen"
                                            class="form-control @error('nidn_dosen') is-invalid @enderror"
                                            value="{{ old('nidn_dosen') }}" placeholder=".">
                                        @error('nidn_dosen')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}" placeholder="Masukkan email dosen">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Masukkan konfirmasi password">
                                        @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="prodi_id">Prodi</label>
                                        <select id="prodi_id" name="prodi_id"
                                            class="form-control @error('prodi_id') is-invalid @enderror">
                                            <option value="">Pilih Prodi</option>
                                            @foreach ($prodi as $item)
                                                <option value="{{ $item->id_prodi }}"
                                                    {{ old('prodi_id') == $item->id_prodi ? 'selected' : '' }}>
                                                    {{ $item->nama_prodi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('prodi_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="golongan_id">Golongan</label>
                                        <select id="golongan_id" name="golongan_id"
                                            class="form-control @error('golongan_id') is-invalid @enderror">
                                            <option value="">Pilih Golongan</option>
                                            @foreach ($golongan as $item)
                                                <option value="{{ $item->id_golongan }}"
                                                    {{ old('golongan_id') == $item->id_golongan ? 'selected' : '' }}>
                                                    {{ $item->nama_golongan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('golongan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select id="gender" name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-Laki
                                            </option>
                                            <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_dosen">Status</label>
                                        <select id="status_dosen" name="status_dosen"
                                            class="form-control @error('status_dosen') is-invalid @enderror">
                                            <option value="1" {{ old('status_dosen') == '1' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="0" {{ old('status_dosen') == '0' ? 'selected' : '' }}>
                                                Tidak Aktif
                                            </option>
                                        </select>
                                        @error('status_dosen')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('dosen.index') }}" class="btn btn-warning">
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
