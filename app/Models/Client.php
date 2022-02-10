<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'client';
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adresses(){
        return $this->belongsToMany(Adresse::class);
    }
    public function adresseLivraison(){
        return $this->belongsTo(Adresse::class);
    }
    public function adresseFacturation(){
        return $this->belongsTo(Adresse::class);
    }
    public function produits(){
        return $this->belongsToMany(Produit::class)->withPivot('quantite');;
    }
    public function commande(){
        return $this->hasMany(Commande::class);
    }
}
