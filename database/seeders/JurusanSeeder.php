<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            [
                'kode_jurusan' => 'TI',
                'nama_jurusan' => 'Teknologi Informasi',
            ],
            [
                'kode_jurusan' => 'TE',
                'nama_jurusan' => 'Teknik  Elektro',
            ],
            [
                'kode_jurusan' => 'AN',
                'nama_jurusan' => 'Administrasi Niaga',
            ],
            [
                'kode_jurusan' => 'BI',
                'nama_jurusan' => 'Bahasa Inggris',
            ],
            [
                'kode_jurusan' => 'TM',
                'nama_jurusan' => 'Teknik Mesin',
            ],
            [
                'kode_jurusan' => 'TS',
                'nama_jurusan' => 'Teknik Sipil',
            ],
            [
                'kode_jurusan' => 'AK',
                'nama_jurusan' => 'Akuntansi',
            ],
        ]);
    }
}
