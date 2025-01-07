@extends('template.index')
@section('title', 'Usulan Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Usulan Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Usulan Tempat PKL</div>
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
                <h2 class="section-title">Tabel Usulan Tempat PKL</h2>
                <p class="section-lead">
                    Data usulan tempat praktik kerja lapangan mahasiswa
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('usulan-pkl.create') }}" class="btn btn-success">
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
                                                <th>Mahasiswa</th>
                                                <th>Tempat PKL</th>
                                                <th>Role Tempat PKL</th>
                                                <th>Bukti CC PKL</th>
                                                <th>Komentar</th>
                                                <th>Alamat</th>
                                                <th>Kota</th>
                                                <th>Tanggal Awal</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Status Usulan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($usulanPKL as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->mahasiswa->nama_mahasiswa ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->tempat_pkl->nama_tempat_pkl ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->role_tempat_pkl->nama_role ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="{{ asset('storage/File-UsulanPkl/' . $item->file_usulan) }}"
                                                            class="btn btn-outline-primary"
                                                            download="{{ $item->file_usulan }}">
                                                            Download <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $item->komentar ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->alamat_tempat_pkl ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->kota_perusahaan ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->tgl_awal_pkl ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->tgl_akhir_pkl ?? '-' }}</td>
                                                    <td class="align-middle">
                                                        @php
                                                            $status = [
                                                                '1' => [
                                                                    'text' => 'Diproses',
                                                                    'class' => 'btn btn-sm btn-warning',
                                                                ],
                                                                '2' => [
                                                                    'text' => 'Ditolak',
                                                                    'class' => 'btn btn-sm btn-danger',
                                                                ],
                                                                '3' => [
                                                                    'text' => 'Diterima',
                                                                    'class' => 'btn btn-sm btn-success',
                                                                ],
                                                            ];
                                                        @endphp
                                                        <span
                                                            class="btn {{ $status[$item->status_usulan]['class'] ?? 'btn-secondary' }}">
                                                            {{ $status[$item->status_usulan]['text'] ?? '-' }}
                                                        </span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <div class="d-flex justify-content-center">
                                                            @if ($item->status_usulan != 3)
                                                                <a href="{{ route('usulan-pkl.edit', $item->id_usulan) }}"
                                                                    class="btn btn-outline-primary mx-1">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endif
                                                            <form
                                                                action="{{ route('usulan-pkl.destroy', $item->id_usulan) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger mx-1">
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
