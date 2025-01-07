<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;
use App\Models\UsulanTempatPKL;
use Illuminate\Support\Facades\Storage;

class PKLMahasiswaController extends Controller
{
    public function index()
    {
        $pklmahasiswa = PKLMahasiswa::with(['pembimbing', 'penguji', 'usulan'])
            ->whereHas('pembimbing')
            ->whereHas('penguji')
            ->whereHas('usulan')
            ->get();

        return view('backend.PKLMhsKap.index', compact('pklmahasiswa'));
    }

    public function create()
    {
        $pklMahasiswa = PKLMahasiswa::all();
        $usulan = UsulanTempatPKL::with('mahasiswa')
            ->where('status_usulan', 3)
            ->whereNotIn('id_usulan', function ($query) {
                $query->select('usulan_tempat_pkl_id')->from('pkl_mahasiswa');
            })
            ->get();

        $pembimbing = Dosen::all();
        $penguji = Dosen::all();

        return view('backend.PKLMhsKap.create', compact('usulan', 'pembimbing', 'penguji'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usulan_tempat_pkl_id' => 'required|exists:usulan_tempat_pkl,id_usulan|unique:pkl_mahasiswa,usulan_tempat_pkl_id',
            'pembimbing_id' => 'required|exists:dosen,id_dosen',
            'penguji_id' => 'required|exists:dosen,id_dosen',
            'judul_laporan' => 'nullable|string|max:255',
            'pembimbing_pkl' => 'nullable|string|max:255',
            'file_nilai' => 'nullable|mimes:pdf|max:2048',
            'file_laporan' => 'nullable|mimes:pdf|max:2048',
            'nilai_industri' => 'nullable|numeric|min:0|max:100',
            'status_ver_pkl' => 'nullable|in:1,2,3',
        ]);

        if ($request->hasFile('file_nilai')) {
            $file = $request->file('file_nilai');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file-nilai', $fileName, 'public');
        }

        if ($request->hasFile('file_laporan')) {
            $file = $request->file('file_laporan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file-laporan', $fileName, 'public');
        }

        PKLMahasiswa::create([
            'usulan_tempat_pkl_id' => $validatedData['usulan_tempat_pkl_id'],
            'pembimbing_id' => $validatedData['pembimbing_id'],
            'penguji_id' => $validatedData['penguji_id'],
            'judul_laporan' => $validatedData['judul_laporan'] ?? null,
            'pembimbing_pkl' => $validatedData['pembimbing_pkl'] ?? null,
            'file_nilai' => $fileName ?? null,
            'file_laporan' => $fileName ?? null,
            'nilai_industri' => $validatedData['nilai_industri'] ?? null,
            'status_ver_pkl' => $validatedData['status_ver_pkl'] ?? '2',
        ]);

        return to_route('pkl-mahasiswa.index')->with([
            'success' => 'Data PKL Mahasiswa berhasil ditambahkan.',
        ]);
    }

    public function edit(string $id_pkl_mahasiswa)
    {
        return view('backend.PKLMhsKap.edit', [
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
            'usulan_tempat_pkl_id' => 'required|exists:usulan_tempat_pkl,id_usulan|unique:pkl_mahasiswa,usulan_tempat_pkl_id,' . $id_pkl_mahasiswa . ',id_pkl_mahasiswa',
            'pembimbing_id' => 'required|exists:dosen,id_dosen',
            'penguji_id' => 'required|exists:dosen,id_dosen',
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
            'usulan_tempat_pkl_id' => $validatedData['usulan_tempat_pkl_id'],
            'pembimbing_id' => $validatedData['pembimbing_id'],
            'penguji_id' => $validatedData['penguji_id'],
            'judul_laporan' => $validatedData['judul_laporan'] ?? null,
            'pembimbing_pkl' => $validatedData['pembimbing_pkl'] ?? null,
            'file_nilai' => $pklMahasiswa->file_nilai,
            'file_laporan' => $pklMahasiswa->file_laporan,
            'nilai_industri' => $validatedData['nilai_industri'] ?? $pklMahasiswa->nilai_industri,
            'status_ver_pkl' => $validatedData['status_ver_pkl'] ?? $pklMahasiswa->status_ver_pkl,
        ]);

        return to_route('pkl-mahasiswa.index')->with([
            'success' => 'Data PKL Mahasiswa berhasil diperbarui.',
        ]);
    }

    public function destroy(string $id_pkl_mahasiswa)
    {
        $pklMahasiswa = PKLMahasiswa::findOrFail($id_pkl_mahasiswa);
        if ($pklMahasiswa->file_nilai && Storage::exists('public/file-nilai/' . $pklMahasiswa->file_nilai)) {
            Storage::delete('public/file-nilai/' . $pklMahasiswa->file_nilai);
        }
        if ($pklMahasiswa->file_laporan && Storage::exists('public/file-laporan/' . $pklMahasiswa->file_laporan)) {
            Storage::delete('public/file-laporan/' . $pklMahasiswa->file_laporan);
        }
        $pklMahasiswa->delete();
        return to_route('pkl-mahasiswa.index')->with([
            'success' => 'Data PKL Mahasiswa berhasil dihapus.',
        ]);
    }
}
