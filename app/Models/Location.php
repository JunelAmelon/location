<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    // public function voiture()
    // {
    //     // return $this->belongsTo(Voitures::class);
    //     return $this->belongsTo(Location::class);

    // }
    

    // public function user()
    // {
    //     // return $this->belongsTo(User::class);
    //     return $this->belongsTo(User::class);

    // }
    protected $fillable = [
        'id_clients',
        'id_voitures',
        'date_debut',
        'date_fin',
        'cout_total',
        'statut'
    ];
}
