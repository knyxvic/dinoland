<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];
    public function dinos(){
        return $this->hasMany(Dino::class);
    }
}
