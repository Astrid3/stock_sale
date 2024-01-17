@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h3>LISTE DES PRODUITS</h3>
           
            <div class="display">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"
                    style="float: right;">
                    Ajouter
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <!-- <a href="/admin/produits/create" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a> -->
        </div>
             </div>
                </div>
        <thead>
            <tr>
                <th>NOMS</th>
                <th>QUALITE</th>
                <th>PRIX</th>
                <th>QUANTITE</th>
                <th>CATEGORIE</th>
                <th >OPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
            <tr>
                <td>{{$produit->nom}}</td>
                <td>{{$produit->qualite}}</td>
                <td>{{$produit->prix}}</td>
                <td> {{$produit->quantite}}</td>
                <td>{{$produit->category->name}}</td>

                <td> <a href="/admin/produits/{{$produit->id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a>
                <!-- <a href="/admin/edit/produits/{{$produit->id}}" class="btn btn-info btn-xs">Editer<i class="mdi mdieyes"></i></a> -->
                <a href="/admin/delete/produits/{{$produit->id}}" class="btn btn-info btn-xs">Supprimer<i class="mdi mdieyes"></i></a>  </td>
                
               
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title text-center" id="exampleModalLabel">Ajout vente</h5> -->
                
            </div>
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">CREATION DU PRODUIT</div>

                <div class="card-body">
                    <form method="POST" action="/admin/produits/store">
                        @csrf

                        <div class="row mb-3">
                            <label for="prix" class="col-md-4 col-form-label text-md-end">PRIX</label>

                            <div class="col-md-10">
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="quantite" class="col-md-4 col-form-label text-md-end">QUANTITE</label>

                            <div class="col-md-10">
                                <input id="quantite" type="number" class="form-control @error('quanite') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">NOM</label>

                            <div class="col-md-10">
                                <input id="nom" type="text" class="form-control @error('NOM') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qualite" class="col-md-4 col-form-label text-md-end">QUALITE</label>

                            <div class="col-md-10">
                                <input id="qualite" type="text" class="form-control @error('qualite') is-invalid @enderror" name="qualite" required autocomplete="qualite">

                                @error('qualite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">DESCRIPTION</label>

                            <div class="col-md-10">
                                <input id="description" type="text" class="form-control" name="description" required autocomplete="description">
                            </div>
                        </div>
                     
                        <div class="row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-end">CATEGORY</label>

                            <div class="col-md-10">
                                <select name="category_id" class="form-control" id="category_id">
                                    <option value="" >Choisir </option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                   </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success"id="btn-save">
                                    CREER
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection