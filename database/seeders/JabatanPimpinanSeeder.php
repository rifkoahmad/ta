<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanPimpinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan_pimpinan')->insert([
            [
                'kode_jabatan_pimpinan' => 'KAJUR',
                'nama_jabatan_pimpinan' => 'Ketua Jurusan',
            ],
            [
                'kode_jabatan_pimpinan' => 'SEKJUR',
                'nama_jabatan_pimpinan' => 'Sekretaris Jurusan',
            ],
            [
                'kode_jabatan_pimpinan' => 'KAPRODI',
                'nama_jabatan_pimpinan' => 'Koordinator Program Studi',
            ],
        ]);
    }
}
