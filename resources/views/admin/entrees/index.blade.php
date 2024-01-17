@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h3>LISTE DES ENTREES DE STOCK</h3>
           
            <div class="display">
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal"
                    style="float: right;">
                    Ajouter
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> <!-- <a href="clients/create" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a> -->
                </div>
                </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>DATE CREATION</th>
              
                 <!-- <td>Adresse</td> -->
                <!-- <td>telephone</td> -->
                <th>OPTION</th> 
            </tr>
        </thead>
        <tbody>
        @foreach($entrees as $lignentree)
            <tr>
                
                <td>{{$lignentree->id}}</td>
                <td>{{$lignentree->name}}</td>
                <td>{{$lignentree->created_at}}</td>
               
                <td> <a href="/admin/entrees/{{$lignentree->id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a>
                <!-- <a href="/admin/edit/clients/{{$lignentree->id}}" class="btn btn-info btn-xs">Editer<i class="mdi mdieyes"></i></a> -->
                <a href="/admin/delete/admins/{{$lignentree->id}}" class="btn btn-danger btn-xs">Supprimer<i class="mdi mdieyes"></i></a>  </td>
                
                
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
                <h5 class="modal-title text-center" id="exampleModalLabel">Ajout entree</h5>
                
                </div>
                
                <div class="modal-body">
                    <div class="row  mb-2 ">
                        <div class="col-md-4">
                            <select name="" id="article_id" class="form-control">
                                <option value="">choix de l'article</option>
                                @foreach ($produits as $produit)
                                <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                @endforeach
                            </select>
    
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="qty" class="form-control" id="qty" placeholder="qty">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="prix" class="form-control" id="price" placeholder="prix">
                        </div>
                      
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-xs " id="btn-add"> <i class="mdi mdi-plus"></i> </button>
                        </div>
    
                    </div>
                    <div class="">
                        <table class="table table-bordered table-sm" id="panier-table">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>qty</th>
                                    <th>price</th>
                                    <!-- <th>Nb total article</th> -->
                                    <th>option</th>
                                </tr>
    
                            </thead>
                            <tbody>
    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn-save">Enregistrement</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
<script>
    $('#btn-add').click(function (e) {
        e.preventDefault();
        // alert('bouton clicked')
      
        var qty = $('#qty').val();
        var article_id = $('#article_id').val();
        var price = $('#price').val();
        var article_name = $('#article_id option:selected').text();
   

        // console.log('La quantite est de '+qty+' et le prix est à  : '+price+' Larticle est '+article_id);


        var tr = '<tr data-article_id=' + article_id +  ' data-qty=' + qty + ' data-price=' + price + '>  <td> ' + article_name + '  </td>    <td>' + qty + '</td>  <td>' + price + '</td>    <td> <button class="btn btn-danger btn-xs btn-delete"> <i class="mdi mdi-delete"></i> </button></td> </tr>';
        //  console.log(tr);

        // var td='<tr> <td> '+article_id+'  </td>  <td>'+qty+'</td>  <td>'+price+'</td></tr>';
        // console.log(td);
        if (qty > 0 && price > 0 && article_id > 0) {
            $('#panier-table').find('tbody').prepend(tr);
            reset()
            $('.btn-delete').click(function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });

        }
        else (
            alert('Veuillez renseinger le(s) champs(s)')
        )

    });

    $('#btn-save').click(function (e) {
        e.preventDefault();
        var ligne_entree = [];
        $('#panier-table tbody tr').each(function () {
            var elt = {
                article_id: $(this).data('article_id'),
                qty: $(this).data('qty'),
                price: $(this).data('price'),
              
            }
            ligne_entree.push(elt);
        });
         console.log(ligne_entree);
        $.ajax({
            type: "POST",
            url: "/admin/entrees",
            data: {
                ligne_entree: ligne_entree,
               
                _token: $('input[name="_token"]').val()
            },
            dataType: "JSON",
            success: function (response) {

                window.location.reload();
                // window.location.replace('/vendeur/ventes');

            }
        });


    });

    function reset() {

        $('#qty').val("");
        $('#article_id').val("");
        $('#price').val("");

    }


</script>
@endsection