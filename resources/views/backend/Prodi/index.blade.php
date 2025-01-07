@extends('template.index')
@section('title', 'Prodi')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Program Studi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Program Studi</div>
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
                <h2 class="section-title">Table Program Studi</h2>
                <p class="section-lead">
                    Data program studi kampus vokasi Politeknik Negeri Padang
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('prodi.create') }}" class="btn btn-success">
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
                                                <th>Kode Program Studi</th>
                                                <th>Nama Program Studi</th>
                                                <th>Nama Jurusan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($prodi as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->kode_prodi }}</td>
                                                    <td class="align-middle">{{ $item->nama_prodi }}</td>
                                                    <td class="align-middle">{{ $item->jurusan->nama_jurusan }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('prodi.edit', $item->id_prodi) }}"
                                                                class="btn btn-outline-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route('prodi.destroy', $item->id_prodi) }}"
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
