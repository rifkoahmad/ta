<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;

class LogBookPemController extends Controller
{
    public function index()
    {
        return view('backend.LogBookPem.index', [
            'logbook' => LogBook::with('pkl_mahasiswa')->get(),
            'pkl_mahasiswa' => PKLMahasiswa::all()
        ]);
    }

    public function edit(string $id_log_book_pkl)
    {
        $logbook = LogBook::findOrFail($id_log_book_pkl);
        return view('backend.LogBookPem.edit', [
            'logbook' => $logbook,
            'pkl_mahasiswa' => PKLMahasiswa::all()
        ]);
    }

    public function update(Request $request, string $id_log_book_pkl)
    {
        $logbook = LogBook::findOrFail($id_log_book_pkl);
        $validated = $request->validate([
            'status' => 'required|in:1,2',
            'komentar' => 'nullable|string',
        ]);

        $logbook->update([
            'status' => $request->status,
            'komentar' => $request->komentar,
        ]);
        return redirect()->route('logbook-pem.index')->with('success', 'Log Book PKL berhasil diperbarui');
    }
}
