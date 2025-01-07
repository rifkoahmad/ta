<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('backend.Golongan.index', compact('golongan'));
    }

    public function create()
    {
        return view('backend.Golongan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_golongan' => 'required|min:2|unique:golongan,kode_golongan',
            'nama_golongan' => 'required|min:4|unique:golongan,nama_golongan'
        ]);
        $golongan = Golongan::create($data);
        if ($golongan) {
            return to_route('golongan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('golongan.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_golongan)
    {
        $golongan = Golongan::findOrFail($id_golongan);
        return view('backend.Golongan.edit', compact('golongan'));
    }

    public function update(Request $request, string $id_golongan)
    {
        $golongan = Golongan::findOrFail($id_golongan);
        $data = $request->validate([
            'kode_golongan' => 'required|min:2|unique:golongan,kode_golongan,' . $golongan->id_golongan . ',id_golongan',
            'nama_golongan' => 'required|min:4|unique:golongan,nama_golongan,' . $golongan->id_golongan . ',id_golongan'
        ]);
        $update = $golongan->update($data);
        return to_route('golongan.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_golongan)
    {
        $golongan = Golongan::find($id_golongan);
        $golongan->delete();
        return to_route('golongan.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
