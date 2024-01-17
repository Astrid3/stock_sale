@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h3>INFOS VENTES VENDEUR  {{$user->name}}</h3>
           <!-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a>-->
        </div>
        <thead>
            
            <tr>
            <td>DESIGNATION</td>
               
                <td>PRODUIT</td>
                  <td>DATE  </td>
                  
                  <td>CATEGORIE DE PRODUIT</td>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($user->ventes as $vente)
            <tr>
                <td>{{$vente->nom}}</td>
                <td>{{$vente->produit->nom}}</td>
                <td>{{$vente->created_at}}</td>
           
                <td> {{$vente->produit->category->name}}</td>
        </tr>
           @endforeach
               
        </tbody>

    </table>
</div>
@endsection