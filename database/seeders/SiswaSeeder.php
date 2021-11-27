<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Siswa::create([
        //     'id' => '1',
        //     'NIS' => 36012726,
        //     'NamaSiswa' => 'Ulwy',
        //     'Alamat' => 'Lamceu',
        //     'JenisKelamin'=> 'Laki-laki',
        //     'NoTelp' => 61942622
        // ]);

        Schema::disableForeignKeyConstraints();

        Siswa::truncate();

        Schema::enableForeignKeyConstraints();

        Siswa::factory()
            ->count(50)
            ->create();
        
    }
}
