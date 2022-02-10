<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeLivraison extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
