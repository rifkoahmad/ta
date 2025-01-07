<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sesi')->insert([
            [
                'periode_sesi' => '08:00 - 10:00',
            ],
            [
                'periode_sesi' => '10:15 - 12:00',
            ],
            [
                'periode_sesi' => '12:15 - 15:00',
            ],
            [
                'periode_sesi' => '15:15 - 17:00',
            ],
        ]);
    }
}
