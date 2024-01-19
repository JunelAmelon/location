<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voitures extends Model
{
    use HasFactory;
    protected $fillable = [
        "marque",
        "modele",
        "couleur",
        "prix_jour",
        "image",
        "created_at",
    ];
    // public function locations()
    // {
    //     return $this->hasMany(Location::class);
    // }

}
