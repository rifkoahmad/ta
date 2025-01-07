<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\SemproMahasiswa;
use Illuminate\Support\Facades\Storage;

class SemproMahasiswaController extends Controller
{
    public function index()
    {
        $sempro = SemproMahasiswa::with(['mahasiswa', 'pembimbing1', 'pembimbing2', 'penguji'])->get();
        return view('backend.SemproMahasiswa.index', compact('sempro'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('backend.SemproMahasiswa.create', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mahasiswa' => 'required|string',
            'judul_sempro' => 'required|string',
            'file_sempro' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $mahasiswa = Mahasiswa::where('nama_mahasiswa', $request->nama_mahasiswa)->first();
        if (!$mahasiswa) {
            return redirect()->back()
                ->withErrors(['nama_mahasiswa' => 'Nama mahasiswa tidak ditemukan dalam database.'])
                ->withInput();
        }

        if ($request->hasFile('file_sempro')) {
            $file = $request->file('file_sempro');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file-sempro', $fileName, 'public');
        }

        SemproMahasiswa::create([
            'mahasiswa_id' => $mahasiswa->id_mahasiswa,
            'judul_sempro' => $validatedData['judul_sempro'],
            'file_sempro' => $fileName ?? null,
        ]);

        return redirect()->route('sempro-mhs.index')->with('success', 'Sempro berhasil ditambahkan');
    }

    public function edit(string $id_sempro_mhs)
    {
        $sempro = SemproMahasiswa::findOrFail($id_sempro_mhs);
        $mahasiswa = Mahasiswa::all();
        return view('backend.SemproMahasiswa.edit', compact('sempro', 'mahasiswa'));
    }

    public function update(Request $request, string $id_sempro_mhs)
    {
        $sempro = SemproMahasiswa::findOrFail($id_sempro_mhs);
        $validatedData = $request->validate([
            'judul_sempro' => 'required|string',
            'file_sempro' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);


        $sempro->judul_sempro = $validatedData['judul_sempro'] ?? '-';

        if ($request->hasFile('file_sempro')) {
            $file = $request->file('file_sempro');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/file-sempro', $fileName);

            if ($sempro->file_sempro && Storage::exists('public/file-sempro/' . $sempro->file_sempro)) {
                Storage::delete('public/file_sempro/' . $sempro->file_sempro);
            }
            $sempro->file_sempro = $fileName;
        } elseif ($request->oldFileSempro) {
            $sempro->file_sempro = $request->oldFileSempro;
        } else {
            $sempro->file_sempro = $sempro->file_sempro;
        }

        $sempro->save();
        return redirect()->route('sempro-mhs.index')->with('success', 'Sempro berhasil diupdate');
    }
}
