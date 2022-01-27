<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EnclosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->word(),
            'superficie'=>$this->faker->randomFloat(2,0,10000),
            'type_enclos_id'=>\App\Models\Type_enclos::all()->random()->id,
            'climat_id'=>\App\Models\Climat::all()->random()->id
        ];
    }
}
