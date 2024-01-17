<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Vente;

class Client extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function ventes(){
       return $this->HasMany(Vente::class);
    }
    
}

