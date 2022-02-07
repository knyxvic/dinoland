<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dino extends Model
{
    use HasFactory;

    protected $fillable = ['nom','taille', 'poids', 'espece_id', 'nourriture_id'];
    public function caracteristiques(){
        return $this->belongsToMany(Caracteristique::class);
    }
    public function espece(){
        return $this->belongsTo(Espece::class);
    }
    public function nourriture(){
        return $this->belongsTo(Nourriture::class);
    }
    public function enclos(){
        return $this->belongsToMany(Enclos::class)->withPivot('dateArrive','dateSortie');
    }
}
