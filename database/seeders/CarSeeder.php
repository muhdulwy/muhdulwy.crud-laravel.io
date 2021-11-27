<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            'id' => '1',
            'Nama' => 'Toyota',
            'Harga' => '300.000.000',
            'Stok'=> '5',
            'siswa_id' => '1'
        ]);
    }
}
