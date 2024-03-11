<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'marque',
        'photo',
        'date',
        'kilometre',
        'matricule',
        'chauffeur_id',
        'etat',
        'prix',
        'place',

    ];



    public function chauffeur()
{
    return $this->belongsTo(Chauffeur::class);
}

public function clients()
{
    return $this->hasMany(Client::class);
}


}
