@extends('layouts.pat')


@section('content')


<br>


<h1>Editer votre Dossier Medical</h1>  



<form class="form-group"    action="{{route('dossier.update',$dossier->ID_dossier) }}"  method="post">
        
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="PUT">

    <label>Date de naissance</label>
    <input type="date" class="form-control" name="Date_naissance" readonly value="<?php echo $dossier->Date_Naissance; ?>"  >
    <label>Sexe</label>
    <select class="form-control" name="sexe" readonly>  <option selected><?php echo $dossier->Sexe; ?></option> </select>
    
    
    <label>Taille</label>
    <input type="number"  class="form-control"  name="taille"  id="taille" value="<?php echo $dossier->Taille; ?>"  @error('taille') is-invalid @enderror required autocomplete='taille' autofocus  >
    @if($errors->has('taille'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('taille') }}</strong>
    </span>
    @endif
    <label>Poids</label>
    <input type="number" class="form-control" name="poids" id="poids" value="<?php echo $dossier->Poids; ?>"  @error('taille') is-invalid @enderror required autocomplete='taille' autofocus >
    @if($errors->has('poids'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('poids') }}</strong>
    </span>
    @endif
    <label>	Type sanguin</label>
    <select class="form-control" name="Type_sang" readonly id="Type_sang"  @error('Type_sang') is-invalid @enderror required autocomplete='Type_sang' autofocus> <option><?php echo $dossier->Type_sanguin; ?></option> 
    @if($errors->has('Type_sang'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Type_sang') }}</strong>
    </span>
    @endif
    <label>	Maladies chroniques</label>
    <textarea class="form-control" name="Maladie_chronique" id="Maladie"  @error('Maladie') is-invalid @enderror required autocomplete='Maladie' autofocus><?php echo $dossier->Maladie_chronique; ?></textarea>
    @if($errors->has('Maladie'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Maladie') }}</strong>
    </span>
    @endif
    <label>	Maladies antecedentes</label>
    <textarea class="form-control" name="Maladies_antecedentes" id="Maladies_antecedentes" @error('Maladies_antecedentes') is-invalid @enderror required autocomplete='Maladies_antecedentes' autofocus><?php echo $dossier->Maladies_antecedentes; ?></textarea>
    @if($errors->has('Maladies_antecedentes'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Maladies_antecedentes') }}</strong>
    </span>
    @endif
    <label>	Allergies</label>
    <textarea class="form-control" name="Allergie" id="Allergie"  @error('Allergie') is-invalid @enderror required autocomplete='Allergie' autofocus ><?php echo $dossier->Allergie; ?></textarea>
    @if($errors->has('Allergie'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Allergie') }}</strong>
    </span>
    @endif
    <label>	Nouveau symptome</label>
    <textarea class="form-control" name="Nouveau_symptome" id="Symptome"  @error('Symptome') is-invalid @enderror required autocomplete='Symptome' autofocus > <?php echo $dossier->Nouveau_symptome; ?></textarea>
    @if($errors->has('Symptome'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Symptome') }}</strong>
    </span>
    @endif
    <label>	Medicaments utilises</label>
    <textarea class="form-control" name="Medicaments_utilises" id="Medicament"  @error('Medicament') is-invalid @enderror required autocomplete='Medicament' autofocus ><?php echo $dossier->Medicaments_utilises; ?></textarea>
    @if($errors->has('Medicament'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Medicament') }}</strong>
    </span>
    @endif
    

  
    <input type="submit" value="submit">


</form>


@endsection
