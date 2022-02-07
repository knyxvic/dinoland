<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Climat extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public function enclos(){
        return $this->hasMany(Enclos::class);
    }
}
