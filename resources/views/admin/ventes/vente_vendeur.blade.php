@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered ">
        <div class="card-header">
            <h3>LISTE DES VENDEURS</h3>
            <a href="/admin/produits/create" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a>
        </div>
        <thead>
            <tr>
                <th>NOMS</th>
                <th>EMAIL</th>
                <th>OPTIONS</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($users  as $user)
            <tr >
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
             <td>    <!-- <a href="/admin/ventes-vendeur/{{$user->id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a> --> 
                <div class="display">
                <button type="button" class="btn btn-info btn-xs" data-vendeur-id="{{$user->id}}" data-toggle="modal" data-target="#exampleModal"
                   >
                   Voir
                </button>
                <button type="button" class="btn btn-danger btn-xs" data-vendeur-id="{{$user->id}}" data-toggle="modal" data-target="#exampleModal"
                   >
                   Supprimer
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> <!-- <a href="clients/create" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a> -->
                </div>
                </div>   <!-- <a href="/admin/edit/ventes-vendeur/{{$user->id}}" class="btn btn-info btn-xs">Editer<i class="mdi mdieyes"></i></a> -->
                <!-- <a href="/admin/delete/ventes-vendeur/{{$user->id}}" class="btn btn-info btn-xs">Supprimer<i class="mdi mdieyes"></i></a>  </td> -->
                
                
             </td>
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
    <table class="table table-striped table-bordered ">
        <div class="card-header">
            <h3 id="vendeur-nom"> {{$user->name}}</h3>
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
        <tbody id="ventes-tbody">
           
               
        </tbody>

    </table>
</div>   
<script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
<script>
     $(document).ready(function() {
        $('#exampleModal').on('show.bs.modal', function(event) {
            var vendeurId = $(event.relatedTarget).data('vendeur-id');
            var nom= $('#vendeur-nom').val();
            $.ajax({
                url: '/admin/ventes-vendeur/'+ vendeurId,
                method: 'GET',
                data: {
                    nom:nom,
                vendeur:vendeurId,
                _token: $('input[name="_token"]').val()
            },
           
            success: function(response) {
                
                
                $('#vendeur-nom').text('INFOS VENDEUR '+response.user.name); 
                 
                var ventes = response.ventes;
                var tbody = $('#ventes-tbody');
                tbody.empty();

                for (var i = 0; i < ventes.length; i++) {
                    
                    var vente = ventes[i];
                    var tr = $('<tr></tr>');
                    var td1 = $('<td></td>').text(vente.nom);
                    var td2 = $('<td></td>').text(vente.produit.nom);
                    var td3 = $('<td></td>').text(vente.created_at);
                    var td4 = $('<td></td>').text(vente.produit.category.name);
                    tr.append(td1, td2, td3, td4);
                    tbody.append(tr);
                   
                }

                console.log(vente);
                
            },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

</script> 
@endsection