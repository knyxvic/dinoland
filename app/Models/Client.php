<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function adresses(){
        return $this->belongsToMany(Adresse::class);
    }
    public function adresseLivraison(){
        return $this->belongsTo(Adresse::class);
    }
    public function adresseFacturation(){
        return $this->belongsTo(Adresse::class);
    }
    public function produits(){
        return $this->belongsToMany(Produit::class)->withPivot('quantite');;
    }
    public function commande(){
        return $this->hasMany(Commande::class);
    }
}
