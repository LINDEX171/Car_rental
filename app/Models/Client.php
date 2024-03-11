<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable= [
        'nom',
        'numero',
        'email',
        'vehicule_id',
        'heure',
        'date',

    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
