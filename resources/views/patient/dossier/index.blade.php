@extends('layouts.pat')

@section('content')

<style>
    table {
      width:100%;
    }
    table, th, td {
      border: 1px solid black;   
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
      text-align: left;
    }
    table#t01 tr:nth-child(even) {
      background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
     background-color: #fff;
    }
    table#t01 th {
      background-color: black;
      color: white;
    }
    </style>


<h1>Dossier medical</h1>
    @if(count($dossier) > 0)

             @foreach ($dossier as $dossier )
             <div class="card p-3 mt-3 mb-3">
                <table id="t01"> 
                 
                <tr><td><h4>Date de naissance  </h4></td> <td><h4>{{$dossier->Date_Naissance}}</h4></td></tr>
                  <tr><td><h4>Sexe   </h4></td> <td><h4>{{$dossier->Sexe}}</h4></td></tr>
                    <tr><td><h4>Taille  </h4></td> <td><h4>{{$dossier->Taille}}</h4></td></tr>
                        <tr><td><h4>Poids  </h4></td><td> <h4>{{$dossier->Poids}}</h4></td></tr>
                            <tr><td><h4>Type sanguin   </h4></td> <td> <h4>{{$dossier->Type_sanguin}}</h4></td></tr>
                                <tr> <td><h4>Maladie chronique   </h4></td><td><h4>{{$dossier->Maladie_chronique}}</h4></td></tr>
                                <tr> <td><h4>Maladies_antecedentes   </h4></td><td><h4>{{$dossier->Maladies_antecedentes}}</h4></td></tr>
                                    <tr> <td><h4>Allergie  </h4></td><td> <h4>{{$dossier->Allergie}}</h4></td></tr>
                                        <tr><td><h4>Nouveau symptome  </h4></td><td><h4>{{$dossier->Nouveau_symptome}}</h4></td></tr>
                                            <tr><td><h4>Medicaments utilises   </h4></td> <td><h4>{{$dossier->Medicaments_utilises}}</h4></td></tr>
                
                    
                          
                        
          
                </table>

             </div>
             
            
             
          

             <a href="/patient/dossier/{{$dossier->ID_dossier}}/edit" class="btn btn-primary">Modifier<a><br><br>

              
            <form action="{{route('dossier.destroy',$dossier->ID_dossier) }}"  method="POST">
              {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" >Supprimer</button>
            </form>
              

            @endforeach




        @else 
        <hr>
        Aucun dossier trouvé<br>
         <a href="/patient/dossier/create" class="btn btn-link">créer un nouveau dossier</a>
         


    @endif



@endsection
 