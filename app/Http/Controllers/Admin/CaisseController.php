<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vente;
use App\Models\Entree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ligne_Entree;

class CaisseController extends Controller
{
    public function index(){
        $ventes=Vente::groupBy('created_at','Id')->get();
        $entree=Ligne_Entree::all();
        return view("admin.caisse.index",compact("entree","ventes"));
    }//
}
