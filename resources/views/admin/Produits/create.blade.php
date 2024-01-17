@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CREATION DU PRODUIT</div>

                <div class="card-body">
                    <form method="POST" action="/admin/produits/store">
                        @csrf

                        <div class="row mb-3">
                            <label for="prix" class="col-md-4 col-form-label text-md-end">PRIX</label>

                            <div class="col-md-6">
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" required autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">NOM</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('NOM') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

                                @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">QUALITE</label>

                            <div class="col-md-6">
                                <input id="qualite" type="text" class="form-control @error('qualite') is-invalid @enderror" name="qualite" required autocomplete="qualite">

                                @error('qualite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">DESCRIPTION</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required autocomplete="description">
                            </div>
                        </div>
                     
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">CATEGORY</label>

                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    <option value="" >Choisir </option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
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

