<?php

namespace Database\Factories;

use App\Models\Barber;
use Illuminate\Database\Eloquent\Factories\Factory;


class BarberFactory extends Factory
{
    protected $model = Barber::class;

    public function definition()
    {
        return [
            'nama_barber' => $this->faker->name(),
            'nohp_barber' => $this->faker->phoneNumber(),
            'umur' => $this->faker->numberBetween(20, 30),
            // Tanggal dibuat dan diperbarui akan diatur otomatis
        ];
    }
}
