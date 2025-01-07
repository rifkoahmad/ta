@extends('template.index')
@section('title', 'Tempat PKL')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tempat PKL</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Data Tempat PKL</div>
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
                <h2 class="section-title">Table Tempat PKL</h2>
                <p class="section-lead">
                    Data tempat PKL kampus vokasi Politeknik Negeri Padang
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="mt-3">
                                    <a href="{{ route('tempat-pkl.create') }}" class="btn btn-success">
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
                                                <th>Kode</th>
                                                <th>Nama Tempat PKL</th>
                                                <th>Alamat Tempat PKL</th>
                                                <th>Tipe</th>
                                                <th>Logo</th>
                                                <th>Detail</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tempatPKL as $item)
                                                <tr>
                                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                                    <td class="align-middle">{{ $item->kode_tempat_pkl }}</td>
                                                    <td class="align-middle">{{ $item->nama_tempat_pkl }}</td>
                                                    <td class="align-middle">{{ $item->alamat_tempat_pkl }}</td>
                                                    <td class="align-middle">
                                                        @if ($item->tipe_tempat_pkl == 1)
                                                            Perusahaan
                                                        @elseif($item->tipe_tempat_pkl == 2)
                                                            Instansi
                                                        @elseif($item->tipe_tempat_pkl == 3)
                                                            Lainnya
                                                        @else
                                                            Tidak Diketahui
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $item->logo_tempat_pkl }}</td>
                                                    <td class="align-middle">{{ $item->detail_info_tempat_pkl }}</td>
                                                    <td class="align-middle">
                                                        <div class="d-flex mt-1">
                                                            <a href="{{ route('tempat-pkl.edit', $item->id_tempat_pkl) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="far fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('tempat-pkl.destroy', $item->id_tempat_pkl) }}"
                                                                method="POST" class="d-inline"
                                                                onsubmit="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-icon btn-danger">
                                                                    <i class="fas fa-times"></i>
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
