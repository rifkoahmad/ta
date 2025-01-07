<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\LogBook;
use App\Models\PKLMahasiswa;
use Illuminate\Http\Request;

class LogBookPemController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $id_dosen = Dosen::where('user_id', $id_user)->first()->id_dosen;
        $pklmhs = PKLMahasiswa::where('pembimbing_id', $id_dosen)->get();
        $logbook = LogBook::whereHas('pkl_mahasiswa', function ($query) use ($id_dosen) {
            $query->where('pembimbing_id', $id_dosen);
        })->get();
        // dd($pklmhs->toArray());
        return view('backend.LogBookPem.index', [
            'logbook' => $logbook,
            'pkl_mahasiswa' => $pklmhs
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
