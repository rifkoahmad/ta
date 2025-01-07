@extends('template.index')
@section('title', 'Log Book PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Log Book PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Log Book PKL</div>
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
                <h2 class="section-title">Table Log Book PKL</h2>
                <p class="section-lead">
                    Data log book kegiatan PKL mahasiswa Politeknik Negeri Padang
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('logbook.create') }}" class="btn btn-success">
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
                                                <th>Nama Mahasiswa</th>
                                                <th>Kegiatan</th>
                                                <th>Tanggal Awal Kegiatan</th>
                                                <th>Tanggal Akhir Kegiatan</th>
                                                <th>Dokumen Laporan</th>
                                                <th>Status</th>
                                                <th>Komentar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($logbook as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->pkl_mahasiswa->usulan->mahasiswa->nama_mahasiswa }}</td>
                                                    <td class="align-middle">{{ $item->kegiatan }}</td>
                                                    <td class="align-middle">{{ $item->tgl_awal_kegiatan }}</td>
                                                    <td class="align-middle">{{ $item->tgl_akhir_kegiatan }}</td>
                                                    <td class="align-middle">
                                                        <a href="{{ asset('storage/Dokumen-LogBook/' . $item->dokumen_laporan) }}"
                                                            class="btn btn-outline-primary"
                                                            download="{{ $item->dokumen_laporan }}">
                                                            Download <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        @php
                                                            $status = [
                                                                '1' => [
                                                                    'text' => 'Diproses',
                                                                    'class' => 'btn btn-sm btn-warning',
                                                                ],
                                                                '2' => [
                                                                    'text' => 'Diverivikasi',
                                                                    'class' => 'btn btn-sm btn-success',
                                                                ],
                                                            ];
                                                        @endphp
                                                        <span
                                                            class="btn {{ $status[$item->status]['class'] ?? 'btn-secondary' }}">
                                                            {{ $status[$item->status]['text'] ?? '-' }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle">{{ $item->komentar }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            @if ($item->status == 2)
                                                                {{-- <span class="btn btn-outline-primary">Finally</span> --}}
                                                            @else
                                                                <a href="{{ route('logbook.edit', $item->id_log_book_pkl) }}"
                                                                    class="btn btn-outline-primary">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endif
                                                            {{-- <form
                                                                action="{{ route('logbook.destroy', $item->id_log_book_pkl) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form> --}}
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
