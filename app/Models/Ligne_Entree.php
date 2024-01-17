<?php

namespace App\Models;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ligne_Entree extends Model
{
    public $timestamps = false;
    use HasFactory;

     public function entree(){
         return $this->belongsTo(Entree::class);
    }
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
