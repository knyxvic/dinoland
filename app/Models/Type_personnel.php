<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_personnel extends Model
{
    use HasFactory;

    public function personnels(){
        return $this->hasMany(Personnel::class);
    }
}
