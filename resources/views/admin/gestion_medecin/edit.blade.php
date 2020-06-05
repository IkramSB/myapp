
@extends('layouts.adm')
@section('content')
<?php
use App\image;
use App\authentification;
?>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
      <form action="{{ route('medecin.update',$user->ID_medecin) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
      <input type="hidden" name="_method" value="GET">

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $user->Nom ?>">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php echo $user->Prenom ?>">
          </div>
        </div>
  
          
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="specialite">Spécialité</label>
                <?php $specialites=DB::table('specialites')->get(); ?>
                <select name="specialite" class="form-control" >
                @foreach ($specialites as $spec)
                     <option value="{{$spec->ID_specialite}}" ><?php echo $spec->specialite;?></option>
                @endforeach
                </select>
               </div>




            <div class="form-group col-md-6">
              <label for="inputNum">Numero de telephone</label>
              <input type="text" class="form-control" id="Telephone" name="Telephone" value="<?php echo $user->Telephone ?>">
            </div> 
          </div>

        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputNum">Ville</label>
              <input type="text" class="form-control" id="Ville" name="Ville" value="<?php echo $user->ville ?>">
            </div> 
            <div class="form-group col-md-8">
                <label for="inputNum">Adresse</label>
                <input type="text" class="form-control" id="addresse" name="addresse" value="<?php echo $user->addresse ?>">
            </div> 
        </div>    

          
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="login" name="login" value="<?php echo $user->email ?>">
          </div>
      
          <div class="form-group col-md-6">
            <label for="inputPassword4">Mot de passe</label>
            <?php $auth=authentification::where('id_user',$user->ID_medecin)->first(); ?>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $auth->password; ?>" >
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Image </label>
            <?php $img=image::where('ID_image',$user->ID_image)->first(); ?>
            <input type="file" class="form-control" id="image" name="image" value="<?php echo $img->image ?>">
          </div>
        
        <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
    </div>
    </div>
    </div> 
    </div>
    
    @endsection    