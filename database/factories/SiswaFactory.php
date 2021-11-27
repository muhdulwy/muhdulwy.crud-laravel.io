<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NIS' => $this->faker->unique()->numerify('##########'),
            'NamaSiswa' => $this->faker->name(),
            'Alamat' => 'Banda Aceh',
            'JenisKelamin'=> $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'NoTelp' => $this->faker->numerify('628#########')
        ];
    }
}
