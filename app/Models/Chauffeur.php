<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'permis',
        'experience',
        'validite',
        'expiration',

    ];

  


    public function vehicules()
    {
        return $this->hasMany(Vehicule::class);
    }
}
