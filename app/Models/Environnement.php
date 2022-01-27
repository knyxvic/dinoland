<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environnement extends Model
{
    use HasFactory;

    public function enclos(){
        return $this->belongsToMany(Enclos::class)->withPivot('superficie');
    }
}
