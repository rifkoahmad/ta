<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index()
    {
        return view('backend.Prodi.index', [
            'prodi' => Prodi::with('jurusan')->get(),
            'jurusan' => Jurusan::get()
        ]);
    }

    public function create()
    {
        return view('backend.Prodi.create', [
            'jurusan' => Jurusan::get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_prodi' => 'required|min:3|unique:prodi,kode_prodi',
            'nama_prodi' => 'required',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan',
        ]);
        $prodi = Prodi::create($data);
        if ($prodi) {
            return to_route('prodi.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('prodi.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_prodi)
    {
        return view('backend.Prodi.edit', [
            'prodi' => Prodi::find($id_prodi),
            'jurusan' => Jurusan::get()
        ]);
    }

    public function update(Request $request, string $id_prodi)
    {
        $prodi = Prodi::findOrFail($id_prodi);
        $data = $request->validate([
            'kode_prodi' => 'required|min:3|unique:prodi,kode_prodi,' . $id_prodi . ',id_prodi',
            'nama_prodi' => 'required|min:4',
            'jurusan_id' => 'required|exists:jurusan,id_jurusan',
        ]);
        $update = $prodi->update($data);
        return to_route('prodi.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_prodi)
    {
        $prodi = Prodi::find($id_prodi);
        $prodi->delete();
        return to_route('prodi.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
