<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlmacenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id int primary key auto_increment' => $this -> faker-> numberId(),
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'Almacen' => $this ->faker -> numberID(),
            'update_datetime' => $this->faker(),
            'created_at datetime'=> $this ->faker()
        ];
    }
}