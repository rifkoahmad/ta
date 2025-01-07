@extends('template.index')
@section('title', 'PKL Nilai')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>PKL Nilai</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data PKL Nilai</div>
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
                <h2 class="section-title">Table PKL Nilai</h2>
                <p class="section-lead">
                    Data nilai Praktik Kerja Lapangan (PKL) mahasiswa
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    @if ($pkl)
                                        <a href="{{ route('pkl-nilai-pembimbing.create') }}" class="btn btn-success">
                                            <i class="bi bi-plus-circle"></i> Add
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Mahasiswa</th>
                                                <th>Dosen</th>
                                                <th>Nilai</th>
                                                <th>Sebagai</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pkl_nilai as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">
                                                        {{ $item->pkl_mahasiswa->usulan->mahasiswa->nama_mahasiswa }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->dosen->nama_dosen }}</td>
                                                    <td class="align-middle">
                                                        @php
                                                            $decodedNilai = json_decode($item->nilai, true);
                                                        @endphp
                                                        {{ is_array($decodedNilai) && isset($decodedNilai['total']) ? $decodedNilai['total'] : 'Nilai tidak valid' }}
                                                    </td>
                                                    <td class="align-middle">{{ $item->sebagai }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('pkl-nilai-pembimbing.edit', $item->id_pkl_nilai) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('pkl-nilai-pembimbing.destroy', $item->id_pkl_nilai) }}"
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
