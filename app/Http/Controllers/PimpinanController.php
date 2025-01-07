<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jurusan;
use App\Models\Pimpinan;
use Illuminate\Http\Request;
use App\Models\JabatanPimpinan;

class PimpinanController extends Controller
{
    public function index()
    {
        return view('backend.Pimpinan.index', [
            'pimpinan' => Pimpinan::with('jabatan_pimpinan', 'dosen', 'jurusan')->get(),
            'jabatan_pimpinan' => JabatanPimpinan::get(),
            'dosen' => Dosen::get(),
            'jurusan' => Jurusan::get()
        ]);
    }

    public function create()
    {
        return view('backend.Pimpinan.create', [
            'jabatan_pimpinan' => JabatanPimpinan::get(),
            'dosen' => Dosen::get(),
            'jurusan' => Jurusan::get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jabatan_pimpinan_id' => 'required|exists:jabatan_pimpinan,id_jabatan_pimpinan',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan',
            'periode' => 'required',
            'status_pimpinan' => 'required|in:0,1'
        ]);
        $pimpinan = Pimpinan::create($data);
        if ($pimpinan) {
            return to_route('pimpinan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('pimpinan.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(Pimpinan $id)
    {
        return view('backend.Pimpinan.edit', [
            'pimpinan' => Pimpinan::find($id->id_pimpinan),
            'jabatan_pimpinan' => JabatanPimpinan::get(),
            'dosen' => Dosen::get(),
            'jurusan' => Jurusan::get(),
        ]);
    }

    public function update(Request $request, Pimpinan $id)
    {
        $data = $request->validate([
            'jabatan_pimpinan_id' => 'required|exists:jabatan_pimpinan,id_jabatan_pimpinan',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan',
            'periode' => 'required',
            'status_pimpinan' => 'required|in:0,1'
        ]);
        $pimpinan = $id->update($data);
        if ($pimpinan) {
            return to_route('pimpinan.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return to_route('pimpinan.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    public function destroy(Pimpinan $id)
    {
        $pimpinan = $id->delete();
        if ($pimpinan) {
            return to_route('pimpinan.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('pimpinan.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
