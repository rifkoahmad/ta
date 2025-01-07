@extends('template.index')
@section('title', 'PKL Mahasiswa Kap')
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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('pkl-mahasiswa.create') }}" class="btn btn-success">
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
                                                <th>Pembimbing</th>
                                                <th>Penguji</th>
                                                {{-- <th>Status Verifikasi PKL</th> --}}
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pklmahasiswa as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">
                                                        {{ optional($item->usulan->mahasiswa)->nama_mahasiswa ?? 'Nama tidak ditemukan' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ optional($item->pembimbing)->nama_dosen ?? 'Tidak ada pembimbing' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ optional($item->penguji)->nama_dosen ?? 'Tidak ada penguji' }}
                                                    </td>
                                                    {{-- <td class="align-middle">
                                                        @php
                                                            $status = [
                                                                '1' => [
                                                                    'text' => 'Ditolak',
                                                                    'class' => 'btn btn-sm btn-danger',
                                                                ],
                                                                '2' => [
                                                                    'text' => 'Diproses',
                                                                    'class' => 'btn btn-sm btn-warning',
                                                                ],
                                                                '3' => [
                                                                    'text' => 'Diterima',
                                                                    'class' => 'btn btn-sm btn-success',
                                                                ],
                                                            ];
                                                        @endphp
                                                        <span
                                                            class="btn {{ $status[$item->status_ver_pkl]['class'] ?? 'btn-secondary' }}">
                                                            {{ $status[$item->status_ver_pkl]['text'] ?? '-' }}
                                                        </span>
                                                    </td> --}}
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('pkl-mahasiswa.edit', $item->id_pkl_mahasiswa) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('pkl-mahasiswa.destroy', $item->id_pkl_mahasiswa) }}"
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
