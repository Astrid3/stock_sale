@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table table-striped table-bordered">
        <div class="card-header">
            <h3>LISTE DES UTILISATEURS</h3>
            <div class="display" style="display: flex; justify-content:flex-end">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Ajouter
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-2" style="float: right;">AJOUTER</a> -->
            </div>
            <thead>
                <tr>
                    <th>NOMS</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th>OPTION</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td> <a href="/admin/users/{{$user->id}}" class="btn btn-info btn-xs">Voir<i class="mdi mdieyes"></i></a>
                <a href="/admin/edit/users/{{$user->id}}" class="btn btn-edit btn-xs">Editer<i class="mdi mdieyes"></i></a>
                <a href="/admin/delete/users/{{$user->id}}" class="btn btn-danger btn-xs">Supprimer<i class="mdi mdieyes"></i></a>  </td>
                
                
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-30">
                            <div class="card">
                                <div class="card-header text-center">REGISTER</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.users.store') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">NOM</label>

                                            <div class="col-md-10">
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">EMAIL</label>

                                            <div class="col-md-10">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">MOT DE
                                                PASSE</label>

                                            <div class="col-md-10">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="password-confirm"
                                                class="col-md-4 col-form-label text-md-end">CONFIRMER LE MOT DE
                                                PASSE</label>

                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="role_id" class="col-md-4 col-form-label text-md-end">{{
                                                __('Role') }}</label>

                                            <div class="col-md-10">
                                                <select id="role_id"
                                                    class="form-control @error('role_id') is-invalid @enderror"
                                                    name="role_id">
                                                    <option value="">Sélectionnez un rôle</option>
                                                    <option value="2">Admin</option>
                                                    <option value="3">Vendeur</option>
                                                    <!-- Ajoutez d'autres options selon les rôles disponibles -->
                                                </select>

                                                @error('role_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit"  class="btn btn-success" id="btn-save">
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