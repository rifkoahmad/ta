<?php

namespace App\Http\Controllers;

use App\Models\SemesterTahunAkademik;
use Illuminate\Http\Request;

class SemesterTahunAkademikController extends Controller
{
    public function index()
    {
        $semester = SemesterTahunAkademik::all();
        return view('backend.Semester.index', compact('semester'));
    }

    public function create()
    {
        return view('backend.Semester.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_smt_thnakd' => 'required|min:4|unique:smt_thnakd,kode_smt_thnakd',
            'nama_smt_thnakd' => 'required|min:8|unique:smt_thnakd,nama_smt_thnakd',
            'status_smt_thnakd' => 'required|string',
        ]);
        $semester = SemesterTahunAkademik::create($data);
        if ($semester) {
            return to_route('semester.index')->with('success', 'Berhasil Menambah Data');
        } else {
            return to_route('semester.index')->with('failed', 'Gagal Menambah Data');
        }
    }

    public function edit(string $id_smt_thnakd)
    {
        $semester = SemesterTahunAkademik::findOrFail($id_smt_thnakd);
        return view('backend.Semester.edit', compact('semester'));
    }

    public function update(Request $request, string $id_smt_thnakd)
    {
        $semester = SemesterTahunAkademik::findOrFail($id_smt_thnakd);
        $data = $request->validate([
            'kode_smt_thnakd' => 'required|min:4|unique:smt_thnakd,kode_smt_thnakd,' . $semester->id_smt_thnakd . ',id_smt_thnakd',
            'nama_smt_thnakd' => 'required|min:8|unique:smt_thnakd,nama_smt_thnakd,' . $semester->id_smt_thnakd . ',id_smt_thnakd',
            'status_smt_thnakd' => 'required|string',
        ]);
        $semester = SemesterTahunAkademik::findOrFail($id_smt_thnakd);
        $semester->update($data);
        if ($semester) {
            return to_route('semester.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return to_route('semester.index')->with('failed', 'Gagal Mengubah Data');
        }
    }

    public function destroy(string $id_smt_thnakd)
    {
        $semester = SemesterTahunAkademik::find($id_smt_thnakd);
        $semester->delete();
        if ($semester) {
            return to_route('semester.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return to_route('semester.index')->with('failed', 'Gagal Menghapus Data');
        }
    }
}
