<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruangan')->insert([
            [
                'kode_ruangan' => 'E-301',
            ],
            [
                'kode_ruangan' => 'E-302',
            ],
            [
                'kode_ruangan' => 'E-303',
            ],
            [
                'kode_ruangan' => 'E-304',
            ],
            [
                'kode_ruangan' => 'E-305',
            ],
            [
                'kode_ruangan' => 'E-306',
            ],
        ]);
    }
}
