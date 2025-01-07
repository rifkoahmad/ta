@extends('template.index')
@section('title', 'Booking')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Booking</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Booking</div>
                </div>
            </div>

            @if (session()->has('success') || session()->has('failed'))
                <div class="alert alert-{{ session()->has('success') ? 'success' : 'danger' }} alert-dismissible fade show"
                    role="alert">
                    {{ session('success') ?? session('failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="section-body">
                <h2 class="section-title">Table Booking</h2>
                <p class="section-lead">
                    Data booking kampus vokasi Politeknik Negeri Padang
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('booking.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i> Add
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ruangan</th>
                                                <th>Sesi</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Tipe</th>
                                                <th>Tgl Booking</th>
                                                <th>Status Booking</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($booking as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->ruangan->kode_ruangan }}</td>
                                                    <td class="align-middle">{{ $item->sesi->periode_sesi }}</td>
                                                    <td class="align-middle">{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->tipe == 1 ? 'PKL' : ($item->tipe == 2 ? 'SEMPRO' : ($item->tipe == 3 ? 'TA' : 'Unknown')) }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->tgl_booking }}</td>
                                                    <td class="align-middle">{{ $item->status_booking }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('booking.edit', $item->id_booking) }}"
                                                                class="btn btn-outline-primary"><i class="fas fa-edit"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('booking.destroy', $item->id_booking) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
