<?php

namespace Database\Seeders;

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
        Permission::create(['name' => 'lihat-jurusan']);
        Permission::create(['name' => 'lihat-prodi']);
        Permission::create(['name' => 'lihat-jabatan_pimpinan']);
        Permission::create(['name' => 'lihat-semester_tahun_akademik']);
        Permission::create(['name' => 'lihat-kelas']);
        Permission::create(['name' => 'lihat-mahasiswa']);
        Permission::create(['name' => 'lihat-golongan']);
        Permission::create(['name' => 'lihat-dosen']);
        Permission::create(['name' => 'lihat-pimpinan']);
        Permission::create(['name' => 'lihat-ruangan']);
        Permission::create(['name' => 'lihat-sesi']);
        Permission::create(['name' => 'lihat-tempat_pkl']);
        Permission::create(['name' => 'lihat-role_tempat_pkl']);
        Permission::create(['name' => 'lihat-usulan_tempat_pkl']);
        Permission::create(['name' => 'lihat-usulan_tempat_pkl']);
        Permission::create(['name' => 'lihat-verifikasi_tempat_pkl']);
        Permission::create(['name' => 'lihat-mahasiswa_pkl']);
        Permission::create(['name' => 'lihat-pkl_nilai']);
        Permission::create(['name' => 'lihat-logbook']);
        Permission::create(['name' => 'lihat-logbook_pem']);

        // Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pembimbing']);
        Role::create(['name' => 'penguji']);
        Role::create(['name' => 'kaprodi']);
        Role::create(['name' => 'mahasiswa']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('lihat-jurusan');
        $roleAdmin->givePermissionTo('lihat-prodi');
        $roleAdmin->givePermissionTo('lihat-jabatan_pimpinan');
        // $roleAdmin->givePermissionTo('lihat-semester_tahun_akademik');
        // $roleAdmin->givePermissionTo('lihat-kelas');
        // $roleAdmin->givePermissionTo('lihat-mahasiswa');
        // $roleAdmin->givePermissionTo('lihat-golongan');
        // $roleAdmin->givePermissionTo('lihat-dosen');
        // $roleAdmin->givePermissionTo('lihat-pimpinan');
        // $roleAdmin->givePermissionTo('lihat-ruangan');
        // $roleAdmin->givePermissionTo('lihat-sesi');
        // $roleAdmin->givePermissionTo('lihat-tempat_pkl');
        // $roleAdmin->givePermissionTo('lihat-role_tempat_pkl');
        // $roleAdmin->givePermissionTo('lihat-usulan_tempat_pkl');
        // $roleAdmin->givePermissionTo('lihat-verifikasi_tempat_pkl');
        // $roleAdmin->givePermissionTo('lihat-mahasiswa_pkl');


        $rolePembimbing = Role::findByName('pembimbing');
        $roleAdmin->givePermissionTo('lihat-mahasiswa_pkl');
    }
}
