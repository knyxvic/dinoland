<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function adresse(){
        return $this->belongsTo(Adresse::class);
    }

    public function enclos(){
        return $this->belongsToMany(Enclos::class);
    }
    public function typePersonnel(){
        return $this->belongsTo(TypePersonnel::class);
    }
}
