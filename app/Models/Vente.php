<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use App\Models\Produits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vente extends Model
{
    use HasFactory;
    public function produit(){
        return $this->belongsTo(Produit::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function facture (){
        return $this->belongsTo(Facture::class);
    }
}
