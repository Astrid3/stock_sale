<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -0.75rem;
            margin-left: -0.75rem;
        }

        td,
        tr,
        th {
            border: 1px solid black;

            text-align: center;

            width: 25%;
        }

.striped tbody tr:nth-of-type(odd) {
  background-color: #dbe1eb;
  }
th{
    background-color: #0090e7;
    color: white;
}
        .text-center {
            text-align: center;
        }
        .list-unstyled{
            text-align: left;
        }

        .colspan {
            text-align: center;
            margin-left:10%
        }
    </style>
</head>

<body>
    <table class="striped">

        <caption class="text-center" style="font-size: 30px; "> {{ $facture->name}}</caption>

        <caption class="list-unstyled">
            <ul  >
            <p style="text-align: right;"><strong>Date  :</strong> {{$facture->created_at}}</p>
                <p><strong>Client :</strong>{{$facture->client_id?$facture->client->name:"NA"}} </p>
                <p><strong>Adresse :</strong>{{$facture->client_id?$facture->client->Adresse:"NA"}} </p> 
                <p><strong>Tél :</strong>{{$facture->client_id?$facture->client->telephone:"NA"}} </p>  
            </ul>
        </caption>


        <thead>
            <tr>
                <th>NOM</th>
                <th> PRIX UNITAIRE</th>
                <th>QTY</th>
                <th>PRIX TOTAL</th>
            </tr>

        </thead>
        <tbody>
            <?php $total = 0; ?>
            @foreach($facture->ventes as $vente)
            <tr>
                <td>
                    {{$vente->produit->nom}}</td>
                <td>{{ number_format($vente->prix , 0 ,',', '.')}}</td>
                <td>{{$vente->quantity }}</td>
                <td>{{ number_format($vente->quantity * $vente->prix , 0 ,',', '.')}}</td>
                <?php $total += $vente->quantity * $vente->prix; ?>
            </tr>

            @endforeach
            <tr colspan="2">
                <td colspan="3" class="colspan">TOTAL:</td>
                <td>{{ number_format($total, 0 ,',', '.')}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>