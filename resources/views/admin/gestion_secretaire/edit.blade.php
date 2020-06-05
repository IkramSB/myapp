
@extends('layouts.adm')
@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
      <form action="{{ route('secretaire.update',$user->ID_secretaire) }}" method="POST" >
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="GET">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $user->Nom; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php echo $user->Prenom; ?>">
          </div>
        </div>
  
          
        <div class="form-row">
            




            <div class="form-group col-md-6">
              <label for="inputNum">Numero de telephone</label>
              <input type="text" class="form-control" id="Telephone" name="Telephone" value="<?php echo $user->telephone; ?>">
            </div> 
          </div>

        

          
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <?php use App\authentification; $auth=authentification::where('id_user',$user->ID_secretaire)->first(); ?>
            <input type="email" class="form-control" id="login" name="login" value="<?php echo $auth->login; ?>">
          </div>
      
          <div class="form-group col-md-6">
            <label for="inputPassword4">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $auth->password; ?>">
          </div>
        </div>

        
        <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
    </div>
    </div>
    </div> 
    </div>
    
    @endsection    