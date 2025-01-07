<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Ruangan;
use App\Models\Sesi;
use App\Models\TempatPKL;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(JurusanSeeder::class);
        $this->call(ProdiSeeder::class);
        $this->call(JabatanPimpinanSeeder::class);
        $this->call(SmtThnAkdSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SesiSeeder::class);
        $this->call(RuanganSeeder::class);
        $this->call(TempatPKLSeeder::class);
        $this->call(RoleTempatPKLSeeder::class);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
