@extends('layouts.vendeur')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered ">
        <div class="card-header">
            <h3>INFOS VENTES FACTURE </h3>
             <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a>-->
        </div>
        <thead>

            <tr>
                <td>DESIGNATION</td>

                <td>PRODUIT</td>
                <td>PRIX </td>
                <td>DATE</td>
                <td>QTY</td>
                <td>TOTAL</td>

            </tr>
        </thead>
        <tbody>

            <?php $total = 0; ?>
            @foreach ($facture->ventes as $vente)
            <tr>
                <td>{{$vente->nom}}</td>
                <td>{{$vente->produit->nom}}</td>
                <td>{{$vente->prix}}</td>
                <td>{{$vente->created_at}}</td>

                <td> {{$vente->quantity}}</td>
                <td> {{$vente->quantity * $vente->prix}}</td>
                <?php $total += $vente->quantity * $vente->prix; ?>
            </tr>

            @endforeach
            <tr>
                <td colspan="5">TOTAUX</td>
                <td> {{$total}}</td>
            </tr>

        </tbody>
    </table>
</div>  
@endsection