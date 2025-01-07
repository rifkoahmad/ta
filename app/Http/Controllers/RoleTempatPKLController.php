<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleTempatPKL;

class RoleTempatPKLController extends Controller
{
    public function index()
    {
        $roleTempatPKL = RoleTempatPKL::all();
        return view('backend.RoleTempatPKL.index', compact('roleTempatPKL'));
    }

    public function create()
    {
        return view('backend.RoleTempatPKL.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string|min:5|max:30|unique:role_tempat_pkl,nama_role',
        ]);
        RoleTempatPKL::create($request->all());
        return redirect()->route('role-tempat-pkl.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(string $id_role_tempat_pkl)
    {
        $roleTempatPKL = RoleTempatPKL::findOrFail($id_role_tempat_pkl);
        return view('backend.RoleTempatPKL.edit', compact('roleTempatPKL'));
    }

    public function update(Request $request, string $id_role_tempat_pkl)
    {
        $roleTempatPKL = RoleTempatPKL::findOrFail($id_role_tempat_pkl);
        $request->validate([
            'nama_role' => 'required|string|min:5|max:30|unique:role_tempat_pkl,nama_role,' . $roleTempatPKL->id_role_tempat_pkl . ',id_role_tempat_pkl',
        ]);
        $roleTempatPKL->update($request->all());
        return redirect()->route('role-tempat-pkl.index')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy(string $id_role_tempat_pkl)
    {
        $roleTempatPKL = RoleTempatPKL::findOrFail($id_role_tempat_pkl);
        $roleTempatPKL->delete();
        return redirect()->route('role-tempat-pkl.index')->with('success', 'Data Berhasil Dihapus');
    }
}
