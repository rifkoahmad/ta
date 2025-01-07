@extends('template.index')
@section('title', 'PKL Mahasiswa')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data PKL Mahasiswa</div>
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
                <h2 class="section-title">Table PKL Mahasiswa</h2>
                <p class="section-lead">
                    Data PKL mahasiswa kampus vokasi Politeknik Negeri Padang
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Pembimbing</th>
                                                <th>Penguji</th>
                                                <th>Judul Laporan</th>
                                                <th>Pembimbing PKL</th>
                                                <th>File Nilai</th>
                                                <th>File Laporan</th>
                                                <th>Nilai Industri</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pklmhs as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">
                                                        {{ optional($item->usulan->mahasiswa)->nama_mahasiswa ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ optional($item->pembimbing)->nama_dosen ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ optional($item->penguji)->nama_dosen ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $item->judul_laporan ?? '-' }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->pembimbing_pkl ?? '-' }}</td>
                                                    <td class="align-middle">
                                                        <a href="{{ asset('storage/file-nilai/' . $item->file_nilai) }}"
                                                            class="btn btn-outline-primary"
                                                            download="{{ $item->file_nilai }}">
                                                            Download <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ asset('storage/file-laporan/' . $item->file_laporan) }}"
                                                            class="btn btn-outline-primary"
                                                            download="{{ $item->file_laporan }}">
                                                            Download <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $item->nilai_industri ?? '-' }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('pkl-mhs.edit', $item->id_pkl_mahasiswa) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
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
