@extends('layouts.adm')



@section('content')
<div class="container"><a  href="secretaire/create"><button class="btn btn-primary">Ajouter une secretaire</button></a><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des Secretaires  </div>
              
        <div class="table-responsive">
            <table class="table table-white text-dark">
                <thead>
                    <tr>
                        <th scope="col">@lang('ID_Secretaire')</th>
                        <th scope="col">@lang('Nom')</th>
                        <th scope="col">@lang('Prenom')</th>
                        <th scope="col">@lang('Num_tele')</th>
                        <th scope="col">@lang('Modification')</th>
                        <th scope="col">@lang('Suppression')</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $us)

               
                    <tr>
                        <td>{{ $us->ID_secretaire }}</td>
                        <td>{{ $us->Nom }}</td>
                        <td>{{ $us->Prenom }}</td>
                        <td>{{ $us->telephone}}</td>
                        
                       
                        <td>
                            <a href="secretaire/edit/{{$us->ID_secretaire}}"><button class="btn btn-primary">Modifier</button></a></td>
                           
                         <td> <form action="{{route('secretaire.destroy',$us->ID_secretaire) }}"  method="POST">
                         {{ csrf_field() }}
                     <input type="hidden" name="_method" value="GET">
                     <button type="submit" class="btn btn-danger" >DELETE</button>
                     </form>
                     </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
@endsection
