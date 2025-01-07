<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::get();
        return view('backend.Jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('backend.Jurusan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_jurusan' => 'required|min:2|unique:jurusan,kode_jurusan',
            'nama_jurusan' => 'required|min:5|unique:jurusan,nama_jurusan'
        ]);
        $jurusan = Jurusan::create($data);
        if ($jurusan) {
            return to_route('jurusan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('jurusan.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_jurusan)
    {
        $jurusan = Jurusan::findOrFail($id_jurusan);
        return view('backend.Jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, string $id_jurusan)
    {
        $jurusan = Jurusan::findOrFail($id_jurusan);
        $data = $request->validate([
            'kode_jurusan' => 'required|min:2|unique:jurusan,kode_jurusan,' . $jurusan->id_jurusan . ',id_jurusan',
            'nama_jurusan' => 'required|min:5|unique:jurusan,nama_jurusan,' . $jurusan->id_jurusan . ',id_jurusan'
        ]);
        $update = $jurusan->update($data);
        return to_route('jurusan.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_jurusan)
    {
        $jurusan = Jurusan::find($id_jurusan);
        $jurusan->delete();
        return to_route('jurusan.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
