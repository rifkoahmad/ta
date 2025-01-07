<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\Mahasiswa;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogBookController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $id_mahasiswa = Mahasiswa::where('user_id', $id_user)->first()->id_mahasiswa;
        $logbook = LogBook::whereHas('pkl_mahasiswa.usulan', function ($query) use ($id_mahasiswa) {
            $query->where('mahasiswa_id', $id_mahasiswa);
        })->get();
        $pklmhs = PKLMahasiswa::whereHas('usulan', function ($query) use ($id_mahasiswa) {
            $query->where('mahasiswa_id', $id_mahasiswa);
        })->get();
        // dd($pklmhs);
        return view('backend.LogBook.index', [
            'logbook' => $logbook,
            'pkl_mahasiswa' => $pklmhs,
        ]);
    }

    public function create()
    {
        $id_user = auth()->user()->id;
        $id_mahasiswa = Mahasiswa::where('user_id', $id_user)->first()->id_mahasiswa;
        $pklmhs = PKLMahasiswa::whereHas('usulan', function ($query) use ($id_mahasiswa) {
            $query->where('mahasiswa_id', $id_mahasiswa);
        })->get();
        return view('backend.LogBook.create', [
            'logbook' => LogBook::with('pkl_mahasiswa')->get(),
            'pkl_mahasiswa' => $pklmhs
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pkl_mahasiswa_id' => 'required|exists:pkl_mahasiswa,id_pkl_mahasiswa',
            'kegiatan' => 'required|string',
            'tgl_awal_kegiatan' => 'required|date',
            'tgl_akhir_kegiatan' => 'required|date|after_or_equal:tgl_awal_kegiatan',
            'dokumen_laporan' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'status' => 'required|in:1,2',
            'komentar' => 'nullable|string',
        ]);

        if ($request->hasFile('dokumen_laporan')) {
            $file = $request->file('dokumen_laporan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('Dokumen-Logbook', $fileName, 'public');
        }

        LogBook::create([
            'pkl_mahasiswa_id' => $request->pkl_mahasiswa_id,
            'kegiatan' => $request->kegiatan,
            'tgl_awal_kegiatan' => $request->tgl_awal_kegiatan,
            'tgl_akhir_kegiatan' => $request->tgl_akhir_kegiatan,
            'dokumen_laporan' => $fileName ?? null,
            'status' => $request->status,
            'komentar' => $request->komentar,
        ]);
        return redirect()->route('logbook.index')->with('success', 'Log Book PKL berhasil ditambahkan');
    }

    public function edit(string $id_log_book_pkl)
    {
        $logbook = LogBook::findOrFail($id_log_book_pkl);
        return view('backend.LogBook.edit', [
            'logbook' => $logbook,
            'pkl_mahasiswa' => PKLMahasiswa::all()
        ]);
    }

    public function update(Request $request, string $id_log_book_pkl)
    {
        $logbook = LogBook::findOrFail($id_log_book_pkl);
        $validated = $request->validate([
            'pkl_mahasiswa_id' => 'required|exists:pkl_mahasiswa,id_pkl_mahasiswa',
            'kegiatan' => 'required|string',
            'tgl_awal_kegiatan' => 'required|date',
            'tgl_akhir_kegiatan' => 'required|date|after_or_equal:tgl_awal_kegiatan',
            'dokumen_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:10240',  // dokumen_laporan bersifat opsional
            'status' => 'required|in:1,2',
            'komentar' => 'nullable|string',
        ]);

        if ($request->hasFile('dokumen_laporan')) {
            $file = $request->file('dokumen_laporan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('Dokumen-Logbook', $fileName, 'public');

            if ($logbook->dokumen_laporan) {
                Storage::disk('public')->delete('Dokumen-Logbook/' . $logbook->dokumen_laporan);
            }
            $logbook->dokumen_laporan = $fileName;
        }

        $logbook->update([
            'pkl_mahasiswa_id' => $request->pkl_mahasiswa_id,
            'kegiatan' => $request->kegiatan,
            'tgl_awal_kegiatan' => $request->tgl_awal_kegiatan,
            'tgl_akhir_kegiatan' => $request->tgl_akhir_kegiatan,
            'status' => $request->status,
            'komentar' => $request->komentar,
        ]);
        return redirect()->route('logbook.index')->with('success', 'Log Book PKL berhasil diperbarui');
    }
}
