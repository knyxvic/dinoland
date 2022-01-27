<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DinoFactory extends Factory
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
            'taille'=>$this->faker->randomFloat(2,0,10000),
            'poids'=>$this->faker->randomFloat(2,0,10000),
            'espece_id'=>\App\Models\Espece::all()->random()->id,
            'nourriture_id'=>\App\Models\Nourriture::all()->random()->id,

        ];
    }
}
