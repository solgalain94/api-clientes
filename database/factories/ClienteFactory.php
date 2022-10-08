<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => "Perez",
            'email' => $this->faker->unique()->safeEmail(),
            'domicilio' => $this->faker->address(),
            'telefono' => $this->faker->cellphone(),
            'cuit' => $this->faker->randomNumber(10)
        ];
    }
}
