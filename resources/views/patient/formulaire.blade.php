@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
      <form action="{{route('lepatient.store')}}" method="POST">
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
              <label for="inputNom">Numero de telephone</label>
              <input type="text" class="form-control" id="Num_tele" name="Num_tele">
            </div> 
            <div class="form-group col-md-6">
             <label for="Cin">CIN</label>
             <input type="text" class="form-control" id="CIN" name="CIN">
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Assurance</label>
            <select id="inputState" class="form-control">
              <option>CNSS</option>
              <option>CNOPS</option>
              <option>Wafa</option>
              <option>Saham</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputZip">Numero d'assurance</label>
            <input type="text" class="form-control" id="Num_assurance" name="Num_assurance">
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="login" name="login">
          </div>
      </div>    
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Confirmer le mot de passe</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Inscription</button>
      </form>
    </div>
    </div>
    </div> 
    </div>
    
    @endsection    