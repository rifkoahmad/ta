@extends('template.index')
@section('title', 'Sempro Mahasiswa Kap')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Seminar Proposal Mahasiswa Kap</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Seminar Proposal Mahasiswa Kap</div>
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
                <h2 class="section-title">Table Seminar Proposal Mahasiswa Kap</h2>
                <p class="section-lead">
                    Data seminar proposal mahasiswa kampus vokasi Politeknik Negeri Padang.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('sempro-mhs.create') }}" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i> Add
                                    </a>
                                </div>
                            </div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Pembimbing 1</th>
                                                <th>Pembimbing 2</th>
                                                <th>Penguji</th>
                                                <th>Judul Seminar</th>
                                                <th>File Sempro</th>
                                                <th>Komentar</th>
                                                <th>Status Verifikasi</th>
                                                <th>Status Judul</th>
                                                <th>Status Seminar</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sempro as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->mahasiswa->nama_mahasiswa ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->pembimbing1->nama_dosen ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->pembimbing2->nama_dosen ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->penguji->nama_dosen ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->judul_sempro }}</td>
                                                    <td class="align-middle">
                                                        <a href="{{ asset('storage/file-sempro/' . $item->file_sempro) }}"
                                                            class="btn btn-outline-primary"
                                                            download="{{ $item->file_sempro }}">
                                                            Download <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $item->komentar ?? '-' }}</td>
                                                    <td class="align-middle">
                                                        @switch($item->status_ver_sempro)
                                                            @case('1')
                                                                Approved
                                                            @break

                                                            @case('2')
                                                                Pending
                                                            @break

                                                            @case('3')
                                                                Rejected
                                                            @break

                                                            @default
                                                                Unknown
                                                        @endswitch
                                                    </td>
                                                    <td class="align-middle">
                                                        @switch($item->status_judul_sempro)
                                                            @case('1')
                                                                Approved
                                                            @break

                                                            @case('2')
                                                                Pending
                                                            @break

                                                            @case('3')
                                                                Rejected
                                                            @break

                                                            @default
                                                                Unknown
                                                        @endswitch
                                                    </td>
                                                    <td class="align-middle">
                                                        @switch($item->status_sempro)
                                                            @case('1')
                                                                Completed
                                                            @break

                                                            @case('2')
                                                                In Progress
                                                            @break

                                                            @default
                                                                Unknown
                                                        @endswitch
                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- @if ($item->status_ver_sempro != 1 && $item->status_judul_sempro != 1 && $item->status_sempro != 1) --}}
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('sempro-mhs-kap.edit', $item->id_sempro_mhs) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            {{-- <form
                                                                    action="{{ route('sempro-mhs-kap.destroy', $item->id_sempro_mhs) }}"
                                                                    method="POST" class="d-inline"
                                                                    onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form> --}}
                                                        </div>
                                                        {{-- @endif --}}
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
