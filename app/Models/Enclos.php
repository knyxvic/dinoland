<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enclos extends Model
{
    use HasFactory;

    public function dinos(){
        return $this->belongsToMany(Dino::class)->withPivot('dateArrive','dateSortie');
    }

    public function typeEnclos(){
        return $this->belongsTo(TypeEnclos::class);
    }
    public function environnement(){
        return $this->belongsToMany(Environnement::class)->withPivot('superficie');
    }
    public function personnels(){
        return $this->belongsToMany(Personnel::class);
    }

}
