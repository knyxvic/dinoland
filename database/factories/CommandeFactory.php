<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'prixTTC'=>$this->faker->randomFloat(2,0,10000),
            'client_id'=>\App\Models\Client::all()->random()->id,
            'adresse_livraison'=>function (array $attributes) {
                $client = Client::find($attributes['client_id']);
                return $client->adresseLivraison->rue .' '. $client->adresseLivraison->cp .' '.$client->adresseLivraison->ville . ' '. $client->adresseLivraison->pays->nom;
            },
            'adresse_facturation'=>function (array $attributes) {
                $client = Client::find($attributes['client_id']);
                return $client->adresseFacturation->rue .' '. $client->adresseFacturation->cp .' '.$client->adresseFacturation->ville . ' '. $client->adresseFacturation->pays->nom;
            },
            'mode_livraison_id'=>\App\Models\Mode_livraison::all()->random()->id,
            'statut_commande_id'=>\App\Models\Statut_commande::all()->random()->id,

        ];
    }
}
