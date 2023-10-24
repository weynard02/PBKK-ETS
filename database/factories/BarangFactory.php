<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->word(),
            'jenis_id' => fake()->numberBetween(1,5),
            'kondisi_id' => fake()->numberBetween(1,3),
            'keterangan' => fake()->sentence(),
            'jumlah' => fake()->randomDigit(),
            'image_path' => 'Box.png'
        ];
    }
}
