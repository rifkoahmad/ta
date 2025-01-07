<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TempatPKLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tempat_pkl')->insert([
            ['nama_tempat_pkl' => 'PT Telkom Indonesia'],
            ['nama_tempat_pkl' => 'PT Indosat Ooredoo Hutchison'],
            ['nama_tempat_pkl' => 'PT XL Axiata Tbk'],
            ['nama_tempat_pkl' => 'PT Smartfren Telecom Tbk'],
            ['nama_tempat_pkl' => 'PT Gojek Indonesia'],
            ['nama_tempat_pkl' => 'PT Tokopedia'],
            ['nama_tempat_pkl' => 'PT Bukalapak Tbk'],
            ['nama_tempat_pkl' => 'PT Shopee Indonesia'],
            ['nama_tempat_pkl' => 'PT Traveloka Indonesia'],
            ['nama_tempat_pkl' => 'PT Ruangguru Indonesia'],
            ['nama_tempat_pkl' => 'PT Akulaku Silvrr Indonesia'],
            ['nama_tempat_pkl' => 'PT DANA Indonesia'],
            ['nama_tempat_pkl' => 'PT OVO Indonesia'],
            ['nama_tempat_pkl' => 'PT Blibli.com'],
            ['nama_tempat_pkl' => 'PT Lazada Indonesia'],
            ['nama_tempat_pkl' => 'PT J&T Express'],
            ['nama_tempat_pkl' => 'PT SiCepat Ekspres Indonesia'],
            ['nama_tempat_pkl' => 'PT Ninja Express'],
            ['nama_tempat_pkl' => 'PT Mitra Integrasi Informatika'],
            ['nama_tempat_pkl' => 'PT Solusi Informatika Semesta'],
            ['nama_tempat_pkl' => 'PT Phintraco Technology'],
            ['nama_tempat_pkl' => 'PT Xsis Mitra Utama'],
            ['nama_tempat_pkl' => 'PT Astra Graphia Information Technology'],
            ['nama_tempat_pkl' => 'Microsoft Indonesia'],
            ['nama_tempat_pkl' => 'Google Indonesia'],
            ['nama_tempat_pkl' => 'Amazon Web Services (AWS) Indonesia'],
            ['nama_tempat_pkl' => 'IBM Indonesia'],
            ['nama_tempat_pkl' => 'Oracle Indonesia'],
            ['nama_tempat_pkl' => 'PT Fliptech Lentera Inspirasi Pertiwi'],
            ['nama_tempat_pkl' => 'PT Bareksa Portal Investasi'],
            ['nama_tempat_pkl' => 'PT Amartha Mikro Fintek'],
            ['nama_tempat_pkl' => 'PT Koinworks Mitra Teknologi'],
            ['nama_tempat_pkl' => 'PT LinkAja Indonesia'],
            ['nama_tempat_pkl' => 'PT Garena Indonesia'],
            ['nama_tempat_pkl' => 'PT Agate International'],
            ['nama_tempat_pkl' => 'PT Lyto Datarindo Fortuna'],
            ['nama_tempat_pkl' => 'PT Anantarupa Studios'],
            ['nama_tempat_pkl' => 'PT GoPlay Indonesia'],
        ]);
    }
}
