<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Golongan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        return view('backend.Dosen.index', [
            'dosen' => Dosen::with('prodi', 'golongan')->get(),
            'prodi' => Prodi::get(),
            'golongan' => Golongan::get()
        ]);
    }

    public function create()
    {
        return view('backend.Dosen.create', [
            'prodi' => Prodi::get(),
            'golongan' => Golongan::get()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_dosen' => 'required|string|max:255',
            'nidn_dosen' => 'required|numeric|unique:dosen,nidn_dosen',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'prodi_id' => 'required|exists:prodi,id_prodi',
            'golongan_id' => 'required|exists:golongan,id_golongan',
            'gender' => 'required|in:laki-laki,perempuan',
            'status_dosen' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->nama_dosen,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Dosen::create([
            'nama_dosen' => $request->nama_dosen,
            'nidn_dosen' => $request->nidn_dosen,
            'user_id' => $user->id,
            'prodi_id' => $request->prodi_id,
            'golongan_id' => $request->golongan_id,
            'gender' => $request->gender,
            'status_dosen' => $request->status_dosen,
        ]);

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan');
    }

    public function edit($id_dosen)
    {
        return view('backend.Dosen.edit', [
            'dosen' => Dosen::with('prodi', 'golongan')->find($id_dosen),
            'prodi' => Prodi::get(),
            'golongan' => Golongan::get()
        ]);
    }

    public function update(Request $request, string $id_dosen)
    {

        $validator = Validator::make($request->all(), [
            'nama_dosen' => 'required|string|max:255',
            'nidn_dosen' => 'required|numeric|unique:dosen,nidn_dosen,' . $id_dosen . ',id_dosen',
            'prodi_id' => 'required|exists:prodi,id_prodi',
            'golongan_id' => 'required|exists:golongan,id_golongan',
            'gender' => 'required|in:laki-laki,perempuan',
            'status_dosen' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // $user = User::findOrFail($id_dosen);
        // $user->name = $request->nama_dosen;
        // $user->save();

        $dosen = Dosen::findOrFail($id_dosen);
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nidn_dosen = $request->nidn_dosen;
        $dosen->prodi_id = $request->prodi_id;
        $dosen->golongan_id = $request->golongan_id;
        $dosen->gender = $request->gender;
        $dosen->status_dosen = $request->status_dosen;
        $dosen->save();

        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui');
    }

    public function destroy(string $id_dosen)
    {
        $dosen = Dosen::findOrFail($id_dosen);
        $dosen->delete();
        return to_route('dosen.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
