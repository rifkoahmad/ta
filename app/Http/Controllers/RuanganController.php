<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::get();
        return view('backend.Ruangan.index', compact('ruangan'));
    }

    public function create()
    {
        return view('backend.Ruangan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_ruangan' => 'required|min:3|unique:ruangan,kode_ruangan',
        ]);
        $ruangan = Ruangan::create($data);
        if ($ruangan) {
            return to_route('ruangan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('ruangan.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        return view('backend.Ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, string $id_ruangan)
    {
        $ruangan = Ruangan::findOrFail($id_ruangan);
        $data = $request->validate([
            'kode_ruangan' => 'required|min:3|unique:ruangan,kode_ruangan,' . $ruangan->id_ruangan . ',id_ruangan',
        ]);
        $update = $ruangan->update($data);
        return to_route('ruangan.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_ruangan)
    {
        $ruangan = Ruangan::find($id_ruangan);
        $ruangan->delete();
        return to_route('ruangan.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
