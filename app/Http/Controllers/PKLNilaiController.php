<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\PKLNilai;
use App\Models\Mahasiswa;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PKLNilaiController extends Controller
{
    public function index()
    {
        return view('backend.PKLNilai.index', [
            'pkl_nilai' => PKLNilai::with('pkl_mahasiswa', 'dosen')->get(),
            'pkl_mahasiswa' => PKLMahasiswa::get(),
            'dosen' => Dosen::get(),
        ]);
    }

    public function create()
    {
        return view('backend.PKLNilai.create', [
            'pkl_mahasiswa' => PKLMahasiswa::get(),
            'dosen' => Dosen::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'pkl_mahasiswa_id' => 'required|exists:pkl_mahasiswa,id_pkl_mahasiswa',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'bahasa' => 'required|numeric|min:0|max:100',
            'analisis' => 'required|numeric|min:0|max:100',
            'sikap' => 'required|numeric|min:0|max:100',
            'komunikasi' => 'required|numeric|min:0|max:100',
            'penyajian' => 'required|numeric|min:0|max:100',
            'penguasaan' => 'required|numeric|min:0|max:100',
            'sebagai' => 'required|in:pembimbing,penguji',
        ]);

        $nilai = [
            'bahasa' => $request->bahasa,
            'analisis' => $request->analisis,
            'sikap' => $request->sikap,
            'komunikasi' => $request->komunikasi,
            'penyajian' => $request->penyajian,
            'penguasaan' => $request->penguasaan,
        ];

        $totalNilai = (
            ($nilai['bahasa'] * 0.15) +
            ($nilai['analisis'] * 0.15) +
            ($nilai['sikap'] * 0.15) +
            ($nilai['komunikasi'] * 0.15) +
            ($nilai['penyajian'] * 0.15) +
            ($nilai['penguasaan'] * 0.25)
        );

        PKLNilai::create([
            'pkl_mahasiswa_id' => $request->pkl_mahasiswa_id,
            'dosen_id' => $request->dosen_id,
            'nilai' => json_encode(array_merge($nilai, ['total' => $totalNilai])),
            'sebagai' => $request->sebagai,
        ]);

        return redirect()->route('pkl-nilai.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(string $id_pkl_nilai)
    {
        $pklNilai = PKLNilai::findOrFail($id_pkl_nilai);
        $pklMahasiswa = PKLMahasiswa::get();
        $dosen = Dosen::get();

        return view('backend.PKLNilai.edit', [
            'pklNilai' => $pklNilai,
            'pkl_mahasiswa' => $pklMahasiswa,
            'dosen' => $dosen,
        ]);
    }

    public function update(Request $request, string $id_pkl_nilai)
    {
        $request->validate([
            'pkl_mahasiswa_id' => 'required|exists:pkl_mahasiswa,id_pkl_mahasiswa',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'bahasa' => 'required|numeric|min:0|max:100',
            'analisis' => 'required|numeric|min:0|max:100',
            'sikap' => 'required|numeric|min:0|max:100',
            'komunikasi' => 'required|numeric|min:0|max:100',
            'penyajian' => 'required|numeric|min:0|max:100',
            'penguasaan' => 'required|numeric|min:0|max:100',
            'sebagai' => 'required|in:pembimbing,penguji',
        ]);

        $pklNilai = PKLNilai::findOrFail($id_pkl_nilai);

        $nilai = [
            'bahasa' => $request->bahasa * 0.15,
            'analisis' => $request->analisis * 0.15,
            'sikap' => $request->sikap * 0.15,
            'komunikasi' => $request->komunikasi * 0.15,
            'penyajian' => $request->penyajian * 0.15,
            'penguasaan' => $request->penguasaan * 0.25,
        ];

        $nilai['total'] = array_sum($nilai);

        $pklNilai->update([
            'pkl_mahasiswa_id' => $request->pkl_mahasiswa_id,
            'dosen_id' => $request->dosen_id,
            'nilai' => json_encode($nilai),
            'sebagai' => $request->sebagai,
        ]);

        return redirect()->route('pkl-nilai.index')->with('success', 'Data berhasil diperbarui.');
    }



    public function destroy(string $id_pkl_nilai)
    {
        $pklNilai = PKLNilai::findOrFail($id_pkl_nilai);
        $pklNilai->delete();
        return redirect()->route('pkl-nilai.index')->with('success', 'Data berhasil dihapus.');
    }
}
