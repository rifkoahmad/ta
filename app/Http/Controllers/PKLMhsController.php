<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;
use App\Models\UsulanTempatPKL;
use Illuminate\Support\Facades\Storage;

class PKLMhsController extends Controller
{
    public function index()
    {
        $pklmhs = PKLMahasiswa::all();
        return view('backend.PKLMhs.index', compact('pklmhs'));
    }

    public function edit(string $id_pkl_mahasiswa)
    {
        return view('backend.PKLMhs.edit', [
            'pklMahasiswa' => PKLMahasiswa::find($id_pkl_mahasiswa),
            'pembimbing' => Dosen::all(),
            'penguji' => Dosen::all(),
            'usulan' => UsulanTempatPKL::all(),
        ]);
    }

    public function update(Request $request, string $id_pkl_mahasiswa)
    {
        $pklMahasiswa = PKLMahasiswa::findOrFail($id_pkl_mahasiswa);

        $validatedData = $request->validate([
            'judul_laporan' => 'nullable|string|max:255',
            'pembimbing_pkl' => 'nullable|string|max:255',
            'file_nilai' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'file_laporan' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'nilai_industri' => 'nullable|numeric|min:0|max:100',
            'status_ver_pkl' => 'nullable|in:1,2,3',
        ]);

        if ($request->hasFile('file_nilai')) {
            $file = $request->file('file_nilai');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/file-nilai', $fileName);

            if ($pklMahasiswa->file_nilai && Storage::exists('public/file-nilai/' . $pklMahasiswa->file_nilai)) {
                Storage::delete('public/file-nilai/' . $pklMahasiswa->file_nilai);
            }
            $pklMahasiswa->file_nilai = $fileName;
        } elseif ($request->oldFileNilai) {
            $pklMahasiswa->file_nilai = $request->oldFileNilai;
        } else {
            $pklMahasiswa->file_nilai = $pklMahasiswa->file_nilai;
        }

        if ($request->hasFile('file_laporan')) {
            $file = $request->file('file_laporan');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/file-laporan', $fileName);

            if ($pklMahasiswa->file_laporan && Storage::exists('public/file-laporan/' . $pklMahasiswa->file_laporan)) {
                Storage::delete('public/file-laporan/' . $pklMahasiswa->file_laporan);
            }
            $pklMahasiswa->file_laporan = $fileName;
        } elseif ($request->oldFileLaporan) {
            $pklMahasiswa->file_laporan = $request->oldFileLaporan;
        } else {
            $pklMahasiswa->file_laporan = $pklMahasiswa->file_laporan;
        }

        $pklMahasiswa->update([
            'judul_laporan' => $validatedData['judul_laporan'] ?? null,
            'pembimbing_pkl' => $validatedData['pembimbing_pkl'] ?? null,
            'file_nilai' => $pklMahasiswa->file_nilai,
            'file_laporan' => $pklMahasiswa->file_laporan,
            'nilai_industri' => $validatedData['nilai_industri'] ?? $pklMahasiswa->nilai_industri,
            'status_ver_pkl' => $validatedData['status_ver_pkl'] ?? $pklMahasiswa->status_ver_pkl,
        ]);

        return to_route('pkl-mhs.index')->with([
            'success' => 'Data PKL Mahasiswa berhasil diperbarui.',
        ]);
    }
}
