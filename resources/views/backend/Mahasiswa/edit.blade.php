@extends('template.index')
@section('title', 'Edit Mahasiswa')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a></div>
                    <div class="breadcrumb-item">Edit Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST"
                                action="{{ route('mahasiswa.update', $mahasiswa->id_mahasiswa) }}">
                                @csrf
                                @method('PATCH')
                                <div class="card-header">
                                    <h4>Edit Mahasiswa</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa"
                                            class="form-control @error('nama_mahasiswa') is-invalid @enderror"
                                            value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}"
                                            placeholder="Masukkan nama mahasiswa">
                                        @error('nama_mahasiswa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="nim_mahasiswa">NIM</label>
                                        <input type="text" id="nim_mahasiswa" name="nim_mahasiswa"
                                            class="form-control @error('nim_mahasiswa') is-invalid @enderror"
                                            value="{{ old('nim_mahasiswa', $mahasiswa->nim_mahasiswa) }}"
                                            placeholder="Masukkan NIM mahasiswa">
                                        @error('nim_mahasiswa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $mahasiswa->email) }}" placeholder="Masukkan email user">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="kelas_id">Kelas</label>
                                        <select id="kelas_id" name="kelas_id"
                                            class="form-control @error('kelas_id') is-invalid @enderror">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option value="{{ $item->id_kelas }}"
                                                    {{ old('kelas_id', $mahasiswa->kelas_id) == $item->id_kelas ? 'selected' : '' }}>
                                                    {{ $item->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Jenis Kelamin</label>
                                        <select id="gender" name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="laki-laki"
                                                {{ old('gender', $mahasiswa->gender) == 'laki-laki' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="perempuan"
                                                {{ old('gender', $mahasiswa->gender) == 'perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_mahasiswa">Status</label>
                                        <select id="status_mahasiswa" name="status_mahasiswa"
                                            class="form-control @error('status_mahasiswa') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == '1' ? 'selected' : '' }}>
                                                Aktif
                                            </option>
                                            <option value="0"
                                                {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == '0' ? 'selected' : '' }}>
                                                Tidak Aktif
                                            </option>
                                        </select>
                                        @error('status_mahasiswa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save Changes
                                    </button>
                                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-warning">
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
