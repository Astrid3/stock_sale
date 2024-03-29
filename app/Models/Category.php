<?php

namespace App\Models;

use App\Models\Produit;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    function produits(){
        return $this->hasMany(Produit::class);
    }
}

 
