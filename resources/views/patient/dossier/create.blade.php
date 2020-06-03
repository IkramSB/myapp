@extends('layouts.pat')

@section('content')

<br>

<h1>créer votre Dossier Medical</h1>  

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<form class="form-group" action="{{ action('DossierController@store')}}" method="post">
        
    @csrf






    <label>Date de naissance</label>
    <input type="date" class="form-control" id="Date_naissance" name="Date_naissance" @error('Date_naissance') is-invalid @enderror required autocomplete='Date_naissance' autofocus >
    @if($errors->has('Date_naissance'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Date_naissance') }}</strong>
    </span>
@endif
    <label>Sexe</label>
    <select class="form-control" name="sexe" id="Sexe" @error('Sexe') is-invalid @enderror required autocomplete='Sexe' autofocus> <option>Male</option> <option>Female</option> </select>
    @if($errors->has('Sexe'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Sexe') }}</strong>
    </span>
    @endif
    <label>Taille</label>
    <input type="number" class="form-control" name="taille" id="taille"  @error('taille') is-invalid @enderror required autocomplete='taille' autofocus >
    @if($errors->has('taille'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('taille') }}</strong>
    </span>
    @endif
    <label>Poids</label>
    <input type="number" class="form-control" name="poids" id="poids"  @error('taille') is-invalid @enderror required autocomplete='taille' autofocus >
    @if($errors->has('poids'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('poids') }}</strong>
    </span>
    @endif
    <label>	Type sanguin</label>
    <select class="form-control" name="Type_sang" id="Type_sang" @error('Type_sang') is-invalid @enderror required autocomplete='Type_sang' autofocus> <option>A+</option> <option>A-</option> <option>B+</option>  <option>B-</option> <option>AB+</option> <option>AB-</option> <option>O+</option> <option>O-</option>  </select>
    @if($errors->has('Type_sang'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Type_sang') }}</strong>
    </span>
    @endif
    <label>  Maladies chroniques</label>
    <textarea class="form-control" name="Maladie_chronique" id="Maladie" @error('Maladie') is-invalid @enderror required autocomplete='Maladie' autofocus></textarea>
    @if($errors->has('Maladie'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Maladie') }}</strong>
    </span>
    @endif
    <label>  Maladies antecedentes</label>
    <textarea class="form-control" name="Maladies_antecedentes" id="Maladies_antecedentes" @error('Maladies_antecedentes') is-invalid @enderror required autocomplete='Maladies_antecedentes' autofocus></textarea>
    @if($errors->has('Maladies_antecedentes'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Maladies_antecedentes') }}</strong>
    </span>
    @endif
    <label>	Allergies</label>
    <textarea class="form-control" name="Allergie" id="Allergie" @error('Allergie') is-invalid @enderror required autocomplete='Allergie' autofocus ></textarea>
    @if($errors->has('Allergie'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Allergie') }}</strong>
    </span>
    @endif
    <label>	Nouveau symptome</label>
    <textarea class="form-control" name="Nouveau_symptome" id="Symptome" @error('Symptome') is-invalid @enderror required autocomplete='Symptome' autofocus ></textarea>
    @if($errors->has('Symptome'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Symptome') }}</strong>
    </span>
    @endif
    <label>	Medicaments utilises</label>
    <textarea class="form-control" name="Medicaments_utilises" id="Medicament" @error('Medicament') is-invalid @enderror required autocomplete='Medicament' autofocus ></textarea>
    @if($errors->has('Medicsment'))
    <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('Medicament') }}</strong>
    </span>
    @endif
    


    
    <input type="submit" value="submit">


</form>


@endsection
