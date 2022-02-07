<?php

namespace Database\Seeders;

use App\Models\Adresse;
use App\Models\Caracteristique;
use App\Models\Commande;
use App\Models\Dino;
use App\Models\Environnement;
use App\Models\Personnel;
use App\Models\Produit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Pays::factory(10)->has(
            \App\Models\Adresse::factory(10)
    )->create();

        \App\Models\Espece::factory(10)->create();
        \App\Models\Nourriture::factory(10)->create();
        \App\Models\Caracteristique::factory(10)->create();
        \App\Models\Dino::factory(10)
            ->create()
            ->each(function($dino){
            $dino->caracteristiques()->attach(
                Caracteristique::all()->random(rand(1,3))->modelKeys()
            );
        });

        \App\Models\Environnement::factory(10)->create();
        \App\Models\Type_enclos::factory(10)->create();
        \App\Models\Climat::factory(10)->create();
        \App\Models\Enclos::factory(10)
            ->create()
            ->each(function($enclos) {
                $enclos->environnement()->attach(
                    Environnement::all()->random(rand(1, 3))->modelKeys(),
                    ['superficie' => rand(1,100)]
                );
                $enclos->dinos()->attach(
                    Dino::all()->random(rand(1, 3))->modelKeys()
                );
            });

        \App\Models\Taxe::factory(10)->create();
        \App\Models\Categorie::factory(10)->create();
        \App\Models\Produit::factory(10)->create();

        \App\Models\Client::factory(10)
            ->create()
            ->each(function ($client){
                $client->adresses()->attach(
                    Adresse::all()->random(rand(1,3))->modelKeys()
                );
                $client->produits()->attach(
                    Produit::all()->random(rand(1,3))->modelKeys(),
                    ['quantite' => rand(1,100)]
                );
            })
        ;

        \App\Models\Mode_livraison::factory(10)->create();
        \App\Models\Statut_commande::factory(10)->create();
        \App\Models\Commande::factory(10)
            ->create()
            ->each(function ($commande){
                $produits = Produit::all()->random(rand(1,3));
                foreach ($produits as $produit){
                    $commande->produits()->attach(
                        $produit->id,
                        ['prixHT'=>$produit->prix, 'quantite'=>rand(1,100),'taux'=>$produit->taxe->taux ],
                    );
                }



            })
        ;



        \App\Models\Type_personnel::factory(10)->has(
            \App\Models\Personnel::factory(10)
        )->create()
            ->each(function($type){
            $type->personnels->each(function($personnel){
                $personnel->enclos()->attach(
                    \App\Models\Enclos::all()->random(rand(1,3))->modelKeys()
                );
            });
        });


        User::factory(10)->create();



    }
}
