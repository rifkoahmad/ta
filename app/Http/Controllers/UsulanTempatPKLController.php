<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\TempatPKL;
use Illuminate\Http\Request;
use App\Models\RoleTempatPKL;
use App\Models\UsulanTempatPKL;
use Illuminate\Support\Facades\Storage;

class UsulanTempatPKLController extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $id_mahasiswa = Mahasiswa::where('user_id', $id_user)->first()->id_mahasiswa;
        return view('backend.Usulan.index', [
            'usulanPKL' => UsulanTempatPKL::with('tempat_pkl', 'mahasiswa', 'role_tempat_pkl')->where('mahasiswa_id', $id_mahasiswa)->get(),
            'tempat_pkl' => TempatPKL::all(),
            'mahasiswa' => Mahasiswa::all(),
            'role_tempat_pkl' => RoleTempatPKL::all()
        ]);
    }

    public function create()
    {
        return view('backend.Usulan.create', [
            'tempat_pkl' => TempatPKL::all(),
            'mahasiswa' => Mahasiswa::all(),
            'role_tempat_pkl' => RoleTempatPKL::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tempat_pkl_id' => 'required|exists:tempat_pkl,id_tempat_pkl',
            'nama_mahasiswa' => 'required|string',
            'role_tempat_pkl_id' => 'required|exists:role_tempat_pkl,id_role_tempat_pkl',
            'komentar' => 'nullable|string',
            'alamat_tempat_pkl' => 'required|string',
            'kota_perusahaan' => 'required|string',
            'tgl_awal_pkl' => 'required|date',
            'tgl_akhir_pkl' => 'required|date|after_or_equal:tgl_awal_pkl',
            'status_usulan' => 'required|in:1,2,3',
            'file_usulan' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $mahasiswa = Mahasiswa::where('nama_mahasiswa', $request->nama_mahasiswa)->first();
        if (!$mahasiswa) {
            return redirect()->back()
                ->withErrors(['nama_mahasiswa' => 'Nama mahasiswa tidak ditemukan dalam database.'])
                ->withInput();
        }

        if ($request->hasFile('file_usulan')) {
            $file = $request->file('file_usulan');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('File-UsulanPkl', $fileName, 'public'); // Simpan di storage/public/File-UsulanPkl
        }

        UsulanTempatPKL::create([
            'tempat_pkl_id' => $validatedData['tempat_pkl_id'],
            'mahasiswa_id' => $mahasiswa->id_mahasiswa,
            'role_tempat_pkl_id' => $validatedData['role_tempat_pkl_id'],
            'komentar' => $validatedData['komentar'],
            'alamat_tempat_pkl' => $validatedData['alamat_tempat_pkl'],
            'kota_perusahaan' => $validatedData['kota_perusahaan'],
            'tgl_awal_pkl' => $validatedData['tgl_awal_pkl'],
            'tgl_akhir_pkl' => $validatedData['tgl_akhir_pkl'],
            'status_usulan' => $validatedData['status_usulan'],
            'file_usulan' => $fileName ?? null,
        ]);
        return redirect()->route('usulan-pkl.index')->with('success', 'Usulan tempat PKL berhasil ditambahkan.');
    }

    public function edit(string $id_usulan)
    {
        $usulanPKL = UsulanTempatPKL::findOrFail($id_usulan);
        $tempatPKL = TempatPKL::all();
        $roleTempatPKL = RoleTempatPKL::all();
        return view('backend.Usulan.edit', [
            'usulanPKL' => $usulanPKL,
            'tempat_pkl' => $tempatPKL,
            'role_tempat_pkl' => $roleTempatPKL,
        ]);
    }
    public function update(Request $request, string $id)
    {
        $usulanPKL = UsulanTempatPKL::findOrFail($id);
        $validatedData = $request->validate([
            'tempat_pkl_id' => 'required|exists:tempat_pkl,id_tempat_pkl',
            // 'nama_mahasiswa' => 'nullable|string',
            'role_tempat_pkl_id' => 'required|exists:role_tempat_pkl,id_role_tempat_pkl',
            'komentar' => 'nullable|string',
            'alamat_tempat_pkl' => 'required|string',
            'kota_perusahaan' => 'required|string',
            'tgl_awal_pkl' => 'required|date',
            'tgl_akhir_pkl' => 'required|date|after_or_equal:tgl_awal_pkl',
            'file_usulan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $usulanPKL->tempat_pkl_id = $validatedData['tempat_pkl_id'];
        $usulanPKL->role_tempat_pkl_id = $validatedData['role_tempat_pkl_id'];
        // $usulanPKL->nama_mahasiswa = $validatedData['nama_mahasiswa'];
        $usulanPKL->komentar = $validatedData['komentar'] ?? '-';
        $usulanPKL->alamat_tempat_pkl = $validatedData['alamat_tempat_pkl'];
        $usulanPKL->kota_perusahaan = $validatedData['kota_perusahaan'];
        $usulanPKL->tgl_awal_pkl = $validatedData['tgl_awal_pkl'];
        $usulanPKL->tgl_akhir_pkl = $validatedData['tgl_akhir_pkl'];

        if ($request->hasFile('file_usulan')) {
            $file = $request->file('file_usulan');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('public/File-UsulanPkl', $fileName);

            if ($usulanPKL->file_usulan && Storage::exists('public/File-UsulanPkl/' . $usulanPKL->file_usulan)) {
                Storage::delete('public/File-UsulanPkl/' . $usulanPKL->file_usulan);
            }
            $usulanPKL->file_usulan = $fileName;
        } elseif ($request->oldFileUsulanPkl) {
            $usulanPKL->file_usulan = $request->oldFileUsulanPkl;
        } else {
            $usulanPKL->file_usulan = $usulanPKL->file_usulan;
        }

        $usulanPKL->save();
        return redirect()->route('usulan-pkl.index')->with('success', 'Usulan Tempat PKL berhasil diperbarui.');
    }
    public function destroy(string $id_usulan)
    {
        $usulanPKL = UsulanTempatPKL::findOrFail($id_usulan);
        if ($usulanPKL->file_usulan && Storage::exists('public/File-UsulanPkl/' . $usulanPKL->file_usulan)) {
            Storage::delete('public/File-UsulanPkl/' . $usulanPKL->file_usulan);
        }
        $usulanPKL->delete();
        return redirect()->route('usulan-pkl.index')->with('success', 'Usulan Tempat PKL berhasil dihapus.');
    }
}
