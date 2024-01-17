<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vente;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;


    public function client(){
      return   $this->BelongsTo(Client::class);
    }
    public function ventes(){
       return      $this->hasMany(Vente::class);
    } 
    public function user(){
      return $this->belongsTo(User::class);
  }
}
