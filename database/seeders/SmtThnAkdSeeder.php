<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SmtThnAkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smt_thnakd')->insert([
            [
                'kode_smt_thnakd' => '20222',
                'nama_smt_thnakd' => '2022/2023-Genap',
                'status_smt_thnakd' => '0',
            ],
            [
                'kode_smt_thnakd' => '20231',
                'nama_smt_thnakd' => '2023/2024-Ganjil',
                'status_smt_thnakd' => '0',
            ],
            [
                'kode_smt_thnakd' => '20232',
                'nama_smt_thnakd' => '2023/2024-Genap',
                'status_smt_thnakd' => '0',
            ],
            [
                'kode_smt_thnakd' => '20231',
                'nama_smt_thnakd' => '2023/2024-Ganjil',
                'status_smt_thnakd' => '1',
            ],
        ]);
    }
}
