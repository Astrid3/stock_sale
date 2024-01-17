<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vente;
use App\Models\Ligne_Entree;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Produit extends Model
{
    use HasFactory;
    public $timestamps = false;
      
  public   function ventes(){
      return $this->hasMany(Vente::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    // public function getNameAttribute(){
    //     return $this->name;
    // }
    public function ligne_entrees()  {
        return $this->hasMany(Ligne_Entree::class);
    }
}
