@extends('template.index')
@section('title', 'Dosen')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Dosen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Dosen</div>
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
                <h2 class="section-title">Tabel Data Dosen</h2>
                <p class="section-lead">
                    Informasi data dosen kampus vokasi Politeknik Negeri Padang
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('dosen.create') }}" class="btn btn-success">
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
                                                <th>Nama Dosen</th>
                                                <th>NIDN</th>
                                                <th>Prodi</th>
                                                <th>Golongan</th>
                                                <th>Gender</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosen as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->nama_dosen }}</td>
                                                    <td class="align-middle">{{ $item->nidn_dosen }}</td>
                                                    <td class="align-middle">{{ $item->prodi->nama_prodi ?? '-' }}</td>
                                                    <td class="align-middle">{{ $item->golongan->nama_golongan ?? '-' }}
                                                    </td>
                                                    <td class="align-middle">{{ ucfirst($item->gender) }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->status_dosen == '1' ? 'Aktif' : 'Non-Aktif' }}
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('dosen.edit', $item->id_dosen) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route('dosen.destroy', $item->id_dosen) }}"
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
