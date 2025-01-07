<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('backend.Mahasiswa.index', [
            'mahasiswa' => Mahasiswa::with('user', 'kelas')->get(),
            'user' => User::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('backend.Mahasiswa.create', [
            'user' => User::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string|max:255',
            'nim_mahasiswa' => 'required|string|max:50|unique:mahasiswa,nim_mahasiswa',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'kelas_id' => 'required|exists:kelas,id_kelas',
            'gender' => 'required|in:laki-laki,perempuan',
            'status_mahasiswa' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->nama_mahasiswa,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Mahasiswa::create([
            'user_id' => $user->id,
            'kelas_id' => $request->kelas_id,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim_mahasiswa' => $request->nim_mahasiswa,
            'gender' => $request->gender,
            'status_mahasiswa' => $request->status_mahasiswa,
        ]);

        return to_route('mahasiswa.index')->with([
            'success' => 'Berhasil Menambahkan Data',
        ]);
    }


    public function edit(string $id_mahasiswa)
    {
        return view('backend.Mahasiswa.edit', [
            'mahasiswa' => Mahasiswa::find($id_mahasiswa),
            'user' => User::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, string $id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($id_mahasiswa);
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required|string|max:255',
            'nim_mahasiswa' => 'required|string|max:50|unique:mahasiswa,nim_mahasiswa,' . $mahasiswa->id_mahasiswa . ',id_mahasiswa',
            'kelas_id' => 'required|exists:kelas,id_kelas',
            'gender' => 'required|in:laki-laki,perempuan',
            'status_mahasiswa' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // $user = User::findOrFail($mahasiswa->user_id);
        // $user->name = $request->nama_mahasiswa;
        // $user->save();

        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->nim_mahasiswa = $request->nim_mahasiswa;
        $mahasiswa->gender = $request->gender;
        $mahasiswa->status_mahasiswa = $request->status_mahasiswa;
        $mahasiswa->save();

        return to_route('mahasiswa.index')->with([
            'success' => 'Berhasil Mengubah Data',
        ]);
    }


    public function destroy(string $id_mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($id_mahasiswa);
        $mahasiswa->delete();
        return to_route('mahasiswa.index')->with([
            'success' => 'Berhasil Menghapus Data',
            'failed' => 'Gagal Menghapus Data'
        ]);
    }
}
