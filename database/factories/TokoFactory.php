<?php

namespace Database\Factories;

use App\Models\Toko;
use Illuminate\Database\Eloquent\Factories\Factory;

class TokoFactory extends Factory
{
    protected $model = Toko::class;

    public function definition()
    {
        return [
            'nama_toko' => 'Barbershop',
            'alamat_toko' => 'Semarang',
            'nohp_toko' => '085329983009'
        ];
    }
}
