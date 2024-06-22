<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'nama_admin' => $this->faker->name(),
            'nohp_admin' => $this->faker->phoneNumber(),
            'password' => Hash::make('12345')
        ];
    }
}
