<?php

namespace App\Http\Controllers\Vendeur;

//use auth;
use App\Models\Role;
use App\Models\User;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::all();
        $factures=Facture::where('user_id', auth()->user()->id)->get();
        $produits=Produit::all();
        $ventes=Vente::where('user_id', auth()->user()->id)->get();
    return view('vendeur.ventes.index',compact('ventes','produits','factures','clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits=Produit::all();
        $clients=Client::all();
        //$users=User::all();
        return view('vendeur.ventes.create',compact('clients','produits','clients'));//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client=request()->client;
        $lignes= request()->lignes;
        
        $facture= new Facture();
        
        $facture->user_id=Auth::user()->id;
        $facture->name='facture - '.date('Hmis');
        $facture->client_id=$client;
        // dd($facture);
        $facture->save();
        
    
        for ($i=0; $i < count($lignes); $i++) { 
            $vente=new Vente();
            $vente->quantity = $lignes[$i]['qty'];
            $vente->prix =$lignes[$i]['price'];
            $vente->produit_id=$lignes[$i]['article_id'];
            // $vente->client_id=$lignes[$i]['client_id'];
            $vente->nom ='Vente  - '.date('Hmis');
            $vente->facture_id =$facture->id;
            $vente->user_id =Auth::user()->id;
            $vente->save();
            $produit= Produit::find($lignes[$i]['article_id']);
            $produit->quantite=$produit->quantite-$lignes[$i]['qty'];
            
            $produit->save();
        }
        return response()->json('ok');
    }
    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
        $totalTotaux =0;
        $facture= Facture::Find($id);
        $vente= Vente::Find($id);
        // $totalTotaux += $vente->quantity * $vente->prix;


        //$produits=Produit::Find($id);
        return view('vendeur.ventes.show',compact('facture','vente','totalTotaux'));//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
