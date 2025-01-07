@extends('template.index')
@section('title', 'Edit Booking')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Booking</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('booking.index') }}">Data Booking</a></div>
                    <div class="breadcrumb-item">Edit Booking</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="form form-vertical" method="POST" enctype="multipart/form-data"
                                action="{{ route('booking.update', $booking->id_booking) }}">
                                @csrf
                                @method('PUT') <!-- Method Spoofing untuk PUT -->
                                <div class="card-header">
                                    <h4>Edit Booking</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ruangan_id">Ruangan</label>
                                        <select id="ruangan_id" name="ruangan_id"
                                            class="form-control @error('ruangan_id') is-invalid @enderror">
                                            <option value="">Pilih Ruangan</option>
                                            @foreach ($ruangan as $item)
                                                <option value="{{ $item->id_ruangan }}"
                                                    {{ $booking->ruangan_id == $item->id_ruangan ? 'selected' : '' }}>
                                                    {{ $item->kode_ruangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('ruangan_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="sesi_id">Sesi</label>
                                        <select id="sesi_id" name="sesi_id"
                                            class="form-control @error('sesi_id') is-invalid @enderror">
                                            <option value="">Pilih Sesi</option>
                                            @foreach ($sesi as $item)
                                                <option value="{{ $item->id_sesi }}"
                                                    {{ $booking->sesi_id == $item->id_sesi ? 'selected' : '' }}>
                                                    {{ $item->periode_sesi }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sesi_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="mahasiswa_id">Mahasiswa</label>
                                        <select id="mahasiswa_id" name="mahasiswa_id"
                                            class="form-control @error('mahasiswa_id') is-invalid @enderror">
                                            <option value="">Pilih Mahasiswa</option>
                                            @foreach ($mahasiswa as $item)
                                                <option value="{{ $item->id_mahasiswa }}"
                                                    {{ $booking->mahasiswa_id == $item->id_mahasiswa ? 'selected' : '' }}>
                                                    {{ $item->nama_mahasiswa }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('mahasiswa_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tipe">Tipe</label>
                                        <select id="tipe" name="tipe"
                                            class="form-control @error('tipe') is-invalid @enderror">
                                            <option value="">Pilih Tipe</option>
                                            <option value="1" {{ $booking->tipe == '1' ? 'selected' : '' }}>PKL</option>
                                            <option value="2" {{ $booking->tipe == '2' ? 'selected' : '' }}>Sempro</option>
                                            <option value="3" {{ $booking->tipe == '3' ? 'selected' : '' }}>TA</option>
                                        </select>
                                        @error('tipe')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_booking">Tanggal Booking</label>
                                        <input type="date" id="tgl_booking" name="tgl_booking"
                                            class="form-control @error('tgl_booking') is-invalid @enderror"
                                            value="{{ $booking->tgl_booking }}">
                                        @error('tgl_booking')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status_booking">Status Booking</label>
                                        <select id="status_booking" name="status_booking"
                                            class="form-control @error('status_booking') is-invalid @enderror">
                                            <option value="">Pilih Status</option>
                                            <option value="0" {{ $booking->status_booking == '0' ? 'selected' : '' }}>Cancel</option>
                                            <option value="1" {{ $booking->status_booking == '1' ? 'selected' : '' }}>Booking</option>
                                            <option value="2" {{ $booking->status_booking == '2' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                        @error('status_booking')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('booking.index') }}" class="btn btn-warning">
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
