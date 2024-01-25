@extends('layouts.vendeur')

@section('content')
<div class="card">
<div class="container mt-1">
     
     <div class="d-flex justify-content-end mb-1 ">
         <a class="btn btn-primary"  href="/vendeur/facture/pdf/{{ $facture->id}}">Export to PDF</a>
     </div>
    <div class="card-body mx-4">
    
        <div class="container">
            <p class="text-center" style="font-size: 30px; "> {{ $facture->name}}</p>
            <div class="row">
                <ul class="list-unstyled">
                    <p><strong>Client :{{$facture->client_id?$facture->client->name:"NA"}}</strong> </p>
                    <p><strong>Date de création :</strong> {{$facture->created_at}}</p>
                </ul>
            </div>


            <div class="row">
                <div class="col-xl-3">
                    <p> <strong>
                            NOM
                        </strong>
                    </p>

                </div>
                <div class="col-xl-3">
                    <p class="float-center">
                        <strong>
                            PRIX UNITAIRE

                    </strong>
                    </p>
                </div>
                <div class="col-xl-3">
                    <p class="float-center"><strong>QTY

                    </strong>
                    </p>
                </div>
                <div class="col-xl-3">
                    <p class="float-center"><strong>PRIX TOTAL</strong>
                    </p>
                </div>
            </div>
            <hr style="border: 1px solid yellow ; margin-right:13% ">
            <?php $total = 0; ?>
            @foreach($facture->ventes as $vente)

            <div class="row">

                <div class="col-xl-3">
                    <p>{{$vente->produit->nom}}</p>
                </div>
                <div class="col-xl-3">
                    <p class="float-end  ">{{ number_format($vente->prix , 0 ,',', '.')}}
                    </p>
                </div>
                <div class="col-xl-3">
                    <p class="float-end">{{$vente->quantity }}
                    </p>
                </div>
                <div class="col-xl-3">
                    <p class="float-end">{{ number_format($vente->quantity * $vente->prix , 0 ,',', '.')}}

                    </p>
                    <?php $total += $vente->quantity * $vente->prix; ?>
                </div>

            </div>



            <hr   style="border: 1px solid yellow; margin-right:13%  ">
            @endforeach

            <div class="row text">

                <div class="col-xl-10">
                    <p class="float-end fw-bold text-right" >TOTAL: {{ number_format($total, 0 ,',', '.')}}
                    </p>
                </div>


            </div>
            <hr style="border: 1px solid yellow; margin-right:13% ">
           

        </div>
    </div>
</div>
@endsection