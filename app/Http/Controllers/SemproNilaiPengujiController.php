<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\SemproMahasiswa;
use App\Models\SemproNilai;
use Illuminate\Http\Request;

class SemproNilaiPengujiController extends Controller
{
    public function index()
    {
        $id_user = auth()->id();
        $id_dosen = Dosen::where('user_id', $id_user)->value('id_dosen');
        $nilai = SemproNilai::with('dosen', 'sempro_mhs')->whereHas('sempro_mhs', function ($query) use ($id_dosen) {
            $query->where('penguji_id', $id_dosen);
        })->get();
        $sempro = SemproMahasiswa::where('penguji_id', $id_dosen)->get();
        return view('backend.SemproNilaiPenguji.index', [
            'sempro_nilai' => $nilai,
            'sempro' => $sempro
        ]);
    }

    public function create()
    {
        $id_user = auth()->id();
        $id_dosen = Dosen::where('user_id', $id_user)->value('id_dosen');
        $sempro =SemproMahasiswa::where('penguji_id', $id_dosen)->get();
        return view('backend.SemproNilaiPenguji.create', [
            'dosen' => $id_dosen,
            'sempro_mhs' => $sempro,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'sempro_mhs_id' => 'required|exists:sempro_mhs,id_sempro_mhs',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'pendahuluan' => 'required|numeric|min:0|max:100',
            'tinjauan_pustaka' => 'required|numeric|min:0|max:100',
            'metodologi_penelitian' => 'required|numeric|min:0|max:100',
            'bahasa_dan_tata_tulis' => 'required|numeric|min:0|max:100',
            'presentasi' => 'required|numeric|min:0|max:100',
            'sebagai' => 'required|in:penguji_1,penguji_2,penguji',
        ]);

        $nilai = [
            'pendahuluan' => $request->pendahuluan,
            'tinjauan_pustaka' => $request->tinjauan_pustaka,
            'metodologi_penelitian' => $request->metodologi_penelitian,
            'bahasa_dan_tata_tulis' => $request->bahasa_dan_tata_tulis,
            'presentasi' => $request->presentasi,
        ];

        $totalNilai = (
            ($nilai['pendahuluan'] * 0.2) +
            ($nilai['tinjauan_pustaka'] * 0.2) +
            ($nilai['metodologi_penelitian'] * 0.2) +
            ($nilai['bahasa_dan_tata_tulis'] * 0.2) +
            ($nilai['presentasi'] * 0.2)
        );

        SemproNilai::create([
            'sempro_mhs_id' => $request->sempro_mhs_id,
            'dosen_id' => $request->dosen_id,
            'nilai' => json_encode(array_merge($nilai, ['total' => $totalNilai])),
            'sebagai' => $request->sebagai,
        ]);

        return redirect()->route('sempro-nilai-penguji.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(string $id_sempro_nilai)
    {
        $semproNilai = SemproNilai::findOrFail($id_sempro_nilai);

        return view('backend.SemproNilaiPenguji.edit', [
            'semproNilai' => $semproNilai,
        ]);
    }

    public function update(Request $request, string $id_sempro_nilai)
    {
        $request->validate([
            'pendahuluan' => 'required|numeric|min:0|max:100',
            'tinjauan_pustaka' => 'required|numeric|min:0|max:100',
            'metodologi_penelitian' => 'required|numeric|min:0|max:100',
            'bahasa_dan_tata_tulis' => 'required|numeric|min:0|max:100',
            'presentasi' => 'required|numeric|min:0|max:100',
        ]);

        $semproNilai = SemproNilai::findOrFail($id_sempro_nilai);

        $nilai = [
            'pendahuluan' => $request->pendahuluan,
            'tinjauan_pustaka' => $request->tinjauan_pustaka,
            'metodologi_penelitian' => $request->metodologi_penelitian,
            'bahasa_dan_tata_tulis' => $request->bahasa_dan_tata_tulis,
            'presentasi' => $request->presentasi,
        ];

        $totalNilai = (
            ($nilai['pendahuluan'] * 0.2) +
            ($nilai['tinjauan_pustaka'] * 0.2) +
            ($nilai['metodologi_penelitian'] * 0.2) +
            ($nilai['bahasa_dan_tata_tulis'] * 0.2) +
            ($nilai['presentasi'] * 0.2)
        );

        $semproNilai->update([
            'nilai' => json_encode(array_merge($nilai, ['total' => $totalNilai])),
        ]);

        return redirect()->route('sempro-nilai-penguji.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id_sempro_nilai)
    {
        $semproNilai = SemproNilai::findOrFail($id_sempro_nilai);
        $semproNilai->delete();
        return redirect()->route('sempro-nilai-penguji.index')->with('success', 'Data berhasil dihapus.');
    }
}
