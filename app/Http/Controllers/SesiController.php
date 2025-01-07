<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    public function index()
    {
        $sesi = Sesi::all();
        return view('backend.Sesi.index', compact('sesi'));
    }

    public function create()
    {
        return view('backend.Sesi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'periode_sesi' => 'required|min:4|unique:sesi,periode_sesi',
        ]);
        $sesi = Sesi::create($data);
        if ($sesi) {
            return to_route('sesi.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('sesi.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_sesi)
    {
        $sesi = Sesi::findOrFail($id_sesi);
        return view('backend.Sesi.edit', compact('sesi'));
    }

    public function update(Request $request, string $id_sesi)
    {
        $sesi = Sesi::findOrFail($id_sesi);
        $data = $request->validate([
            'periode_sesi' => 'required|min:4|unique:sesi,periode_sesi,' . $sesi->id_sesi . ',id_sesi',
        ]);
        $update = $sesi->update($data);
        return to_route('sesi.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_sesi)
    {
        $sesi = Sesi::findOrFail($id_sesi);
        $sesi = $sesi->delete();
        return to_route('sesi.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
