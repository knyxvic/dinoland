<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    public function livraison(){
        return $this->belongsTo(ModeLivraison::class);
    }
    public function statut(){
        return $this->belongsTo(StatutCommande::class);
    }
    public function produits(){
        return $this->belongsToMany(Produit::class)->withPivot('quantite', 'prixHT','taux');;
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
