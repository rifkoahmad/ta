<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pimpinan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['dosenPembimbing', 'pimpinanProdi', 'dosenPenguji', 'mahasiswa', 'admin'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $adminUser = User::where('name', 'Admin User')->first();
        $adminUser->assignRole('admin');

        $dosenData = Dosen::all();
        foreach ($dosenData as $dosen) {
            $user_dosen = User::where('id', $dosen->user_id)->first();
            $user_dosen->assignRole('dosenPembimbing');
            $user_dosen->assignRole('dosenPenguji');
        }

        $kaprodi = Dosen::where('id_dosen', 11)->first();
        $user_kaprodi = User::where('id', $kaprodi->user_id)->first();
        $user_kaprodi->assignRole('pimpinanProdi');

        $mahasiswa = Mahasiswa::all();
        foreach ($mahasiswa as $mhs) {
            $user_mahasiswa = User::where('id', $mhs->user_id)->first();
            $user_mahasiswa->assignRole('mahasiswa');
        }
    }
}
