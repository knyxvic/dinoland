<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    public function taxe(){
        return $this->belongsTo(Taxe::class);
    }
    public function commandes(){
        return $this->belongsToMany(Commande::class)->withPivot('quantite', 'prixHT','taux');;
    }
    public function clients(){
        return $this->belongsToMany(Client::class)->withPivot('quantite');
    }
}
