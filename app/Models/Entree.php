<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Ligne_Entree;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entree extends Model
{
    use HasFactory;

    public function ligne_entrees(){
        return $this->hasMany(Ligne_Entree::class);
    }
public function produit(){
    return $this->belongsTo(Produit::class);
}
public function user(){
    return $this->belongsTo(User::class);
}
}

