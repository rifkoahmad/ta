<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'prodi_id' => 3,
                'smt_thnakd_id' => 2,
                'kode_kelas' => '4-TRPL-A',
                'nama_kelas' => '4-Rekayasa Perangkat Lunak-A',
            ],
            [
                'prodi_id' => 3,
                'smt_thnakd_id' => 2,
                'kode_kelas' => '4-TRPL-B',
                'nama_kelas' => '4-Rekayasa Perangkat Lunak-B',
            ],
            [
                'prodi_id' => 3,
                'smt_thnakd_id' => 1,
                'kode_kelas' => '3-TRPL-C',
                'nama_kelas' => '3-Rekayasa Perangkat Lunak-C',
            ],
            [
                'prodi_id' => 1,
                'smt_thnakd_id' => 2,
                'kode_kelas' => '3-TI-A',
                'nama_kelas' => '3-Teknik Informatika-A',
            ],
            [
                'prodi_id' => 2,
                'smt_thnakd_id' => 3,
                'kode_kelas' => '3-TK-A',
                'nama_kelas' => '3-Teknik Komputer-A',
            ],
        ]);
    }
}
