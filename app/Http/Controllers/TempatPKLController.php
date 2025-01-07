<?php

namespace App\Http\Controllers;

use App\Models\TempatPKL;
use Illuminate\Http\Request;

class TempatPKLController extends Controller
{
    public function index()
    {
        $tempatPKL = TempatPKL::all();
        return view('backend.TempatPKL.index', compact('tempatPKL'));
    }

    public function create()
    {
        return view('backend.TempatPKL.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_tempat_pkl' => 'required|min:5|unique:tempat_pkl,nama_tempat_pkl',
        ]);
        TempatPKL::create($data);
        return to_route('tempat-pkl.index')->with('success', 'Berhasil Menambah Data');
    }

    public function edit(string $id_tempat_pkl)
    {
        $tempatPKL = TempatPKL::findOrFail($id_tempat_pkl);
        return view('backend.TempatPKL.edit', compact('tempatPKL'));
    }

    public function update(Request $request, string $id_tempat_pkl)
    {
        $tempatPKL = TempatPKL::findOrFail($id_tempat_pkl);
        $data = $request->validate([
            'nama_tempat_pkl' => 'required|min:5|unique:tempat_pkl,nama_tempat_pkl,' . $tempatPKL->id_tempat_pkl . ',id_tempat_pkl',
        ]);
        $tempatPKL->update($data);
        return to_route('tempat-pkl.index')->with('success', 'Berhasil Mengubah Data');
    }

    public function destroy(string $id_tempat_pkl)
    {
        $tempatPKL = TempatPKL::find($id_tempat_pkl);
        $tempatPKL->delete();
        return to_route('tempat-pkl.index')->with('success', 'Berhasil Menghapus Data');
    }
}
