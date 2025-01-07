<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Models\SemesterTahunAkademik;

class KelasController extends Controller
{
    public function index()
    {
        return view('backend.Kelas.index', [
            'kelas' => Kelas::with('prodi', 'smt_thnakd')->get(),
            'prodi' => Prodi::get(),
            'smt_thnakd' => SemesterTahunAkademik::get()
        ]);
    }

    public function create()
    {
        return view('backend.Kelas.create', [
            'prodi' => Prodi::get(),
            'smt_thnakd' => SemesterTahunAkademik::get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_kelas' => 'required|min:3|unique:kelas,kode_kelas',
            'nama_kelas' => 'required|min:4',
            'prodi_id' => 'required|exists:prodi,id_prodi',
            'smt_thnakd_id' => 'required|exists:smt_thnakd,id_smt_thnakd'
        ]);
        $kelas = Kelas::create($data);
        if ($kelas) {
            return to_route('kelas.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('kelas.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_kelas)
    {
        return view('backend.Kelas.edit', [
            'prodi' => Prodi::get(),
            'smt_thnakd' => SemesterTahunAkademik::get(),
            'kelas' => Kelas::find($id_kelas)
        ]);
    }

    public function update(Request $request, string $id_kelas)
    {
        $kelas = Kelas::findOrFail($id_kelas);
        $data = $request->validate([
            'kode_kelas' => 'required|min:3|unique:kelas,kode_kelas,' . $id_kelas . ',id_kelas',
            'nama_kelas' => 'required|min:4',
            'prodi_id' => 'required|exists:prodi,id_prodi',
            'smt_thnakd_id' => 'required|exists:smt_thnakd,id_smt_thnakd'
        ]);
        $update = $kelas->update($data);
        return to_route('kelas.index')->with([
            'success' => 'Berhasil Mengubah Data',
            'failed' => 'Gagal Mengubah Data'
        ]);
    }

    public function destroy(string $id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas->delete();
        return to_route('kelas.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
