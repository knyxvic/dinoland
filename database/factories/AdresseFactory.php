<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rue'=>$this->faker->streetAddress(),
            'cp'=>$this->faker->postcode(),
            'ville'=>$this->faker->city(),
            'pays_id' => \App\Models\Pays::all()->random()->id,

        ];
    }
}
