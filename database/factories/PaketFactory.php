<?php

namespace Database\Factories;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketFactory extends Factory
{
    protected $model = Paket::class;

    public function definition()
    {
        return [
            'nama_paket' => $this->faker->sentence(2),
            'keterangan_paket' => $this->faker->sentence(6),
            'harga' => $this->faker->numberBetween(50000, 200000)
        ];
    }
}

