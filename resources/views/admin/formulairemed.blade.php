
@extends('layouts.adm')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
      <form action="{{ route('lemedecin.store') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom">
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="adresse">Spécialité</label>
                <input type="text" class="form-control" id="Spécialité" name="Spécialité">
               </div>
            <div class="form-group col-md-6">
              <label for="inputNum">Numero de telephone</label>
              <input type="text" class="form-control" id="Telephone" name="Telephone">
            </div> 
          </div>

        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputNum">Ville</label>
              <input type="text" class="form-control" id="Ville" name="Ville">
            </div> 
            <div class="form-group col-md-8">
                <label for="inputNum">Adresse</label>
                <input type="text" class="form-control" id="addresse" name="addresse">
            </div> 
        </div>    

          
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="login" name="login">
          </div>
      
          <div class="form-group col-md-6">
            <label for="inputPassword4">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
    </div>
    </div> 
    </div>
    
    @endsection    