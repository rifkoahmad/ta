<?php

namespace App\Http\Controllers;

use App\Models\JabatanPimpinan;
use Illuminate\Http\Request;

class JabatanPimpinanController extends Controller
{
    public function index()
    {
        $jabatanPimpinan = JabatanPimpinan::get();
        return view('backend.JabatanPimpinan.index', compact('jabatanPimpinan'));
    }

    public function create()
    {
        return view('backend.JabatanPimpinan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_jabatan_pimpinan' => 'required|min:3|unique:jabatan_pimpinan,kode_jabatan_pimpinan',
            'nama_jabatan_pimpinan' => 'required|min:4|unique:jabatan_pimpinan,nama_jabatan_pimpinan'
        ]);
        $jabatanPimpinan = JabatanPimpinan::create($data);
        if ($jabatanPimpinan) {
            return to_route('jabatan-pimpinan.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('jabatan-pimpinan.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_jabatan_pimpinan)
    {
        $jabatanPimpinan = JabatanPimpinan::findOrFail($id_jabatan_pimpinan);
        return view('backend.JabatanPimpinan.edit', compact('jabatanPimpinan'));
    }

    public function update(Request $request, string $id_jabatan_pimpinan)
    {
        $jabatanPimpinan = JabatanPimpinan::findOrFail($id_jabatan_pimpinan);
        $data = $request->validate([
            'kode_jabatan_pimpinan' => 'required|min:3|unique:jabatan_pimpinan,kode_jabatan_pimpinan,' . $jabatanPimpinan->id_jabatan_pimpinan . ',id_jabatan_pimpinan',
            'nama_jabatan_pimpinan' => 'required|min:4|unique:jabatan_pimpinan,nama_jabatan_pimpinan,' . $jabatanPimpinan->id_jabatan_pimpinan . ',id_jabatan_pimpinan'
        ]);
        $update = $jabatanPimpinan->update($data);
        return to_route('jabatan-pimpinan.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_jabatan_pimpinan)
    {
        $jabatanPimpinan = JabatanPimpinan::findOrFail($id_jabatan_pimpinan);
        $jabatanPimpinan->delete();
        return to_route('jabatan-pimpinan.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
