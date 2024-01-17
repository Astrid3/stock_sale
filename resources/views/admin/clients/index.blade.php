@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h3>LISTE DES CLIENTS</h3>
           
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
              
                <th>ADRESSE</th>
                <th>TELEPHONE</th>
                <th>OPTION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                
                <td>{{$client->id}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->Adresse}}</td>
                <td>{{$client->telephone}}</td>
                <td> <a href="/admin/clients/{{$client->id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a>
                <a href="/admin/edit/clients/{{$client->id}}" class="btn btn-edit btn-xs">Editer<i class="mdi mdieyes"></i></a>
                <a href="/admin/delete/clients/{{$client->id}}" class="btn btn-danger btn-xs">Supprimer<i class="mdi mdieyes"></i></a>  </td>
                
                
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
                <div class="card-header">CREATION DU CLIENT</div>

                <div class="card-body">
                    <form method="POST" action="/admin/clients/store">
                        @csrf

                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">telephone</label>

                            <div class="col-md-10">
                                <input id="telephone" type="number" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">NOM</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     
                      <div class="row mb-3">
                            <label for="Adresse" class="col-md-4 col-form-label text-md-end">ADRESSE</label>

                            <div class="col-md-10">
                                <input id="Adresse" type="text" class="form-control" name="Adresse" required autocomplete="Adresse">
                            </div>
                        </div>
                     
                  
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" id="btn-save">
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