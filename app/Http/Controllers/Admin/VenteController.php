<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Vente;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();   
        $ventes=Vente::all();
        return view('admin.ventes.index',compact('ventes','user')); //
    }

    public function venteVendeur()
    {
        
        $users=User::all();
        
        return view('admin.ventes.vente_vendeur',compact('users'));
    }
    public function showVendeur($id){
        $vendeur=request()->vendeur;
 $vendeurId = request()->vendeur;
        $user= User::Find($id);
        $ventes = Vente::with('produit','produit.category')->where('user_id', $vendeurId)->get();
        // $produit= Produit::with('category')->where('category_id', $id)->get();
        $produit=Produit::Find($id);
         return response()->json([
        'user' => $user,
        'ventes' => $ventes ,
        'produits'=>$produit
    ]);
    }
  
    public function show( $id)
    {
        $user= User::Find($id);
      return view ('admin.ventes.show',compact('user'));  //
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
        //
    }

    /**
     * Display the specified resource.
     */
 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
       //
    }
public function  EditVentevendeur($id){
   // $clients=Client::all();
   // $produits=Produit::all();
    $user= User::Find($id);
    return view ('admin.ventes.edit',compact('user'));
}

public function UpdateVentevendeur(Request $request,$id){
    $user=User::find($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email
]);
    return redirect()->back(); 
}
public function Deletevendeur($id){
    $user=User::find($id);
    $user->delete();
    return redirect()->back(); 
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
