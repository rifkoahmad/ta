<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\SemproMahasiswa;
use App\Models\SemproNilai;
use Illuminate\Http\Request;

class SemproNilaiController extends Controller
{
    public function index()
    {
        return view('backend.SemproNilai.index', [
            'sempro_nilai' => SemproNilai::with('dosen', 'sempro_mhs')->get(),
            'dosen' => Dosen::all(),
            'sempro_mhs' => SemproMahasiswa::all(),
        ]);
    }

    public function create()
    {
        return view('backend.SemproNilai.create', [
            'dosen' => Dosen::all(),
            'sempro_mhs' => SemproMahasiswa::all(),
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
            'sebagai' => 'required|in:pembimbing_1,pembimbing_2,penguji',
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

        return redirect()->route('sempro-nilai.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit(string $id_sempro_nilai)
    {
        $semproNilai = SemproNilai::findOrFail($id_sempro_nilai);
        $sempro_mhs = SemproMahasiswa::get();
        $dosen = Dosen::get();

        return view('backend.SemproNilai.edit', [
            'semproNilai' => $semproNilai,
            'sempro_mhs' => $sempro_mhs,
            'dosen' => $dosen,
        ]);
    }

    public function update(Request $request, string $id_sempro_nilai)
    {
        $request->validate([
            'sempro_mhs_id' => 'required|exists:sempro_mhs,id_sempro_mhs',
            'dosen_id' => 'required|exists:dosen,id_dosen',
            'pendahuluan' => 'required|numeric|min:0|max:100',
            'tinjauan_pustaka' => 'required|numeric|min:0|max:100',
            'metodologi_penelitian' => 'required|numeric|min:0|max:100',
            'bahasa_dan_tata_tulis' => 'required|numeric|min:0|max:100',
            'presentasi' => 'required|numeric|min:0|max:100',
            'sebagai' => 'required|in:pembimbing_1,pembimbing_2,penguji',
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
            'sempro_mhs_id' => $request->sempro_mhs_id,
            'dosen_id' => $request->dosen_id,
            'nilai' => json_encode(array_merge($nilai, ['total' => $totalNilai])),
            'sebagai' => $request->sebagai,
        ]);

        return redirect()->route('sempro-nilai.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $id_sempro_nilai)
    {
        $semproNilai = SemproNilai::findOrFail($id_sempro_nilai);
        $semproNilai->delete();
        return redirect()->route('sempro-nilai.index')->with('success', 'Data berhasil dihapus.');
    }
}
