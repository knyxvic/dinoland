<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function personnel(){
        return $this->hasMany(Personnel::class);
    }

    public function pays(){
        return $this->belongsTo(Pays::class);
    }

    public function clients(){
        return $this->belongsToMany(User::class);
    }
    public function adressesLivraisons(){
        return $this->belongsTo(Adresse::class);
    }
    public function adressesFacturations(){
        return $this->belongsTo(Adresse::class);
    }
}
