@extends('layouts.vendeur')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREATION DE LA VENTE</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('vendeur.ventes.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">NOM</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                    name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">



                            <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Quantité')
                                }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number"
                                    class="form-control @error('quantity') is-invalid @enderror" name="quantity">

                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">PRODUIT</label>

                            <div class="col-md-6">
                                <select name="produit_id" class="form-control">
                                    <option value="">Choisir </option>
                                    @foreach($produits as $produit)
                                    <option value="{{$produit->id}}">{{$produit->nom}}</option>
                                    @endforeach
                                </select>
                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">CLIENT</label>

                            <div class="col-md-6">
                                <select name="client_id" class="form-control ">
                                    <option value="">Choisir </option>
                                    @foreach($clients as $client)
                                    <option value="{{$client->id}}">{{$client->name}}</option>
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
                                <button type="submit" class="btn btn-primary">
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