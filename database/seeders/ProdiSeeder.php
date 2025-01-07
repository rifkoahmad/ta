<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodi')->insert([
            ['jurusan_id' => 1, 'kode_prodi' => 'TI001', 'nama_prodi' => 'D3 Teknik Informatika'],
            ['jurusan_id' => 1, 'kode_prodi' => 'TI002', 'nama_prodi' => 'D3 Teknik Komputer'],
            ['jurusan_id' => 1, 'kode_prodi' => 'TI003', 'nama_prodi' => 'D4 Rekayasa Perangkat Lunak'],

            ['jurusan_id' => 2, 'kode_prodi' => 'TE001', 'nama_prodi' => 'D3 Teknik Elektronika'],
            ['jurusan_id' => 2, 'kode_prodi' => 'TE002', 'nama_prodi' => 'D3 Teknik Tenaga Listrik'],
            ['jurusan_id' => 2, 'kode_prodi' => 'TE003', 'nama_prodi' => 'D4 Teknik Telekomunikasi'],

            ['jurusan_id' => 3, 'kode_prodi' => 'TM001', 'nama_prodi' => 'D3 Teknik Mesin'],
            ['jurusan_id' => 3, 'kode_prodi' => 'TM002', 'nama_prodi' => 'D3 Teknik Perancangan Manufaktur'],
            ['jurusan_id' => 3, 'kode_prodi' => 'TM003', 'nama_prodi' => 'D4 Teknologi Rekayasa Manufaktur'],

            ['jurusan_id' => 4, 'kode_prodi' => 'TS001', 'nama_prodi' => 'D3 Teknik Sipil'],
            ['jurusan_id' => 4, 'kode_prodi' => 'TS002', 'nama_prodi' => 'D4 Manajemen Proyek Konstruksi'],

            ['jurusan_id' => 5, 'kode_prodi' => 'AK001', 'nama_prodi' => 'D3 Akuntansi'],
            ['jurusan_id' => 5, 'kode_prodi' => 'AK002', 'nama_prodi' => 'D3 Keuangan dan Perbankan'],
            ['jurusan_id' => 5, 'kode_prodi' => 'AK003', 'nama_prodi' => 'D4 Akuntansi Manajerial'],

            ['jurusan_id' => 6, 'kode_prodi' => 'AN001', 'nama_prodi' => 'D3 Administrasi Bisnis'],
            ['jurusan_id' => 6, 'kode_prodi' => 'AN002', 'nama_prodi' => 'D4 Manajemen Bisnis Internasional'],

            ['jurusan_id' => 7, 'kode_prodi' => 'BI001', 'nama_prodi' => 'D3 Bahasa Inggris'],
        ]);
    }
}
