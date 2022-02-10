<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
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
            'prix'=>$this->faker->randomFloat(2, 0, 100),
            'quantite'=>$this->faker->randomNumber(),
            'taxe_id'=>\App\Models\Taxe::all()->random()->id,
            'category_id'=>\App\Models\Categorie::all()->random()->id
        ];
    }
}
