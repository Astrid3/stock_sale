<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use App\Models\Role;
use Illuminate\Http\Request;
use  App\Models\Category;
class ProduitController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $categories=Category::all();
        $produits = Produit::all();
       
        return view('Admin.Produits.index')->with(compact('produits','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $categories=Category::all();
       return view('admin.Produits.create')->with(compact('categories'));;//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit=new Produit;
        $produit->nom=$request->nom;
        $produit->qualite=$request->qualite;
        $produit->prix=$request->prix     ;
        $produit->description=$request->description; 
        $produit->category_id=$request->category_id; 
        dd($produit);
        $produit->save();
        return redirect()->back(); //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
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
