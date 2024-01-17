@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h1>LISTE DES VENTES</h>
                <!-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a>-->
        </div>
        <thead>
            <tr>
                <th>DESIGNATION</th>
                <th>DATE</th>
                <th>QUANTITY</th>
                <th>VENDEUR</th>
                <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventes as $vente)
            <tr>
                <td>{{$vente->nom}}</td>
                <td>{{$vente->created_at}}</td>
                <td>{{$vente->quantity}}</td>
                <td>{{$vente->user->name}}</td>
                <td><a href="/admin/ventes/{{$vente->Id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection