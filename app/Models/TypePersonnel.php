<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePersonnel extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
