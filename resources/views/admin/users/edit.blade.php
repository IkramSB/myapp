@extends('layouts.app')
@section('content')
<br><br><br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
      <form action="{{route('userpatient.update',$user->ID_patient) }}" method="POST">
        
        <?php   use App\authentification;  $auth=authentification::where('id_user',$user->ID_patient)->first(); ?>
                       
            {{ csrf_field() }}
           <input type="hidden" name="_method" value="PUT">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?php  echo $user->Nom; ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php  echo $user->Prenom; ?>">
          </div>
        </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputNom">Numero de telephone</label>
              <input type="text" class="form-control" id="Num_tele" name="Num_tele" value="<?php  echo $user->Num_tele; ?>">
            </div> 
            <div class="form-group col-md-6">
             <label for="Cin">CIN</label>
             <input type="text" class="form-control" id="CIN" name="CIN" value="<?php  echo $user->CIN; ?>">
            </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputState">Assurance</label>
            <select id="inputState" class="form-control" >
              <option>CNSS</option>
              <option>CNOPS</option>
              <option>Wafa</option>
              <option>Saham</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputZip">Numero d'assurance</label>
            <input type="text" class="form-control" id="Num_assurance" name="Num_assurance" value="<?php  echo $user->Num_assurance; ?>">
          </div>
          </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="login" name="login" value="<?php  echo $auth->login; ?>">
          </div>
      </div>    
      
        
        <button type="submit" class="btn btn-primary">Confirmer</button>
      </form>
    </div>
    </div>
    </div> 
    </div>
    
    @endsection 