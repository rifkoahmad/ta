<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\SemproMahasiswa;
use Illuminate\Support\Facades\Storage;

class SemproMahasiswaKapController extends Controller
{
    public function index()
    {
        $sempro = SemproMahasiswa::with(['mahasiswa', 'pembimbing1', 'pembimbing2', 'penguji'])->get();
        return view('backend.SemproMahasiswaKap.index', compact('sempro'));
    }

    public function edit(string $id_sempro_mhs)
    {
        $sempro = SemproMahasiswa::findOrFail($id_sempro_mhs);
        $mahasiswa = Mahasiswa::all();
        $dosen = Dosen::all();
        return view('backend.SemproMahasiswaKap.edit', compact('sempro', 'mahasiswa', 'dosen'));
    }

    public function update(Request $request, string $id_sempro_mhs)
    {
        $sempro = SemproMahasiswa::findOrFail($id_sempro_mhs);
        $validatedData = $request->validate([
            'pembimbing_1_id' => 'required|exists:dosen,id_dosen',
            'pembimbing_2_id' => 'required|exists:dosen,id_dosen',
            'penguji_id' => 'required|exists:dosen,id_dosen',
            'komentar' => 'nullable|string',
            'status_ver_sempro' => 'required|in:1,2,3,4',
            'status_judul_sempro' => 'required|in:1,2,3,4',
            'status_sempro' => 'required|in:1,2,3',
        ]);

        $sempro->pembimbing_1_id = $validatedData['pembimbing_1_id'] ?? '-';
        $sempro->pembimbing_2_id = $validatedData['pembimbing_2_id'] ?? '-';
        $sempro->penguji_id = $validatedData['penguji_id'] ?? '-';
        $sempro->komentar = $validatedData['komentar'] ?? '-';
        $sempro->status_ver_sempro = $validatedData['status_ver_sempro'] ?? '-';
        $sempro->status_judul_sempro = $validatedData['status_judul_sempro'] ?? '-';
        $sempro->status_sempro = $validatedData['status_sempro'] ?? '-';

        $sempro->save();
        return redirect()->route('sempro-mhs-kap.index')->with('success', 'Sempro berhasil diupdate');
    }

    // public function destroy(string $id_sempro_mhs)
    // {
    //     $sempro = SemproMahasiswa::findOrFail($id_sempro_mhs);
    //     if ($sempro->file_sempro && Storage::exists('public/file-sempro/' . $sempro->file_sempro)) {
    //         Storage::delete('public/file-sempro/' . $sempro->file_sempro);
    //     }
    //     $sempro->delete();
    //     return redirect()->route('sempro-mhs.index')->with('success', 'Sempro berhasil dihapus');
    // }
}
