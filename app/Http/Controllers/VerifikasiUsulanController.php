<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\TempatPKL;
use Illuminate\Http\Request;
use App\Models\RoleTempatPKL;
use App\Models\UsulanTempatPKL;

class VerifikasiUsulanController extends Controller
{
    public function index()
    {
        return view('backend.VerifikasiUsulan.index', [
            'usulanPKL' => UsulanTempatPKL::get(),
        ]);
    }

    public function edit(string $id_usulan)
    {
        $usulanPKL = UsulanTempatPKL::findOrFail($id_usulan);
        return view('backend.VerifikasiUsulan.edit', compact('usulanPKL'));
    }

    public function update(Request $request, string $id_usulan)
    {
        $usulanPKL = UsulanTempatPKL::findOrFail($id_usulan);
        $validatedData = $request->validate([
            'status_usulan' => 'required|in:1,2,3',
            'komentar' => 'nullable|string',
        ]);

        $usulanPKL->status_usulan = $validatedData['status_usulan'];
        $usulanPKL->komentar = $validatedData['komentar'];
        $usulanPKL->save();

        return redirect()->route('verifikasi-usulan-pkl.index')->with('success', 'Usulan PKL berhasil diperbarui.');
    }
}
