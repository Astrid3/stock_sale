@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered ">
        <div class="card-header">
            <h3>INFOS ENTREES {{$entrees->name}}</h3>
             <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a>
        </div>
        <thead>

            <tr>
                <td>id</td>
                <td>PRODUIT</td>
                <td>PRIX </td>
                <td>QTY</td>
              

            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>
            @foreach ($entrees->ligne_entrees as $vente)
            <tr>
                <td>{{$vente->id}}</td>
                <td>{{$vente->produit->nom}}</td>
                <td>{{$vente->price}}</td>
                <td> {{$vente->quantite}}</td>
           
             
            </tr>

            @endforeach
           

        </tbody>
    </table>
</div>  
@endsection