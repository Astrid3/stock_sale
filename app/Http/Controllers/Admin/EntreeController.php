<?php

namespace App\Http\Controllers\Admin;

use App\Models\Entree;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ligne_Entree;
use Illuminate\Support\Facades\Auth;

class EntreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits= Produit::all();
        $entrees=Entree::all();
        return view ('admin.entrees.index',compact('entrees','produits'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ligne_entree= request()->ligne_entree;
       
        $entree=new Entree();
        $entree->user_id=Auth::user()->id;
        $entree->name='entree - '.date('Hmis'); 
        $entree->save();//
        for ($i=0; $i < count($ligne_entree); $i++) { 
            $ligneentree=new Ligne_Entree();
            $ligneentree->quantite = $ligne_entree[$i]['qty'];
            $ligneentree->price =$ligne_entree[$i]['price'];
            $ligneentree->produit_id=$ligne_entree[$i]['article_id'];
            $ligneentree->entree_id=$entree->id;
            // dd($ligneentree);
            // $vente->client_id=$lignes[$i]['client_id'];
            $ligneentree->save();
            $produit= Produit::find($ligne_entree[$i]['article_id']);
            $produit->quantite=$produit->quantite+$ligne_entree[$i]['qty'];
            
            $produit->save();
        }
      
        return response()->json('ok') ;
    }

    /**
     * Display the specified resource.
     */
    public function show( Entree $id)
    {
    //     $produit= Produit::find($id);
    //     $produit->quantite=$produit->quantite+$id;
    //    $entree=Entree::find($id);
    //    return view('admin.entrees.show',compact('entree','produit')); //
    }
    public function showentree( $id)
    {
        $produit= Produit::find($id);
        
       $entrees=Entree::find($id);
       return view('admin.entrees.show',compact('entrees','produit')); //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entree $entree)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entree $entree)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entree $entree)
    {
        //
    }
}
