@extends('layouts.adm')



@section('content')
<div class="container"><a  href="medecin/create"><button class="btn btn-primary">Ajouter un medecin</button></a><br><br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des Medecins  </div>
              
        <div class="table-responsive">
            <table class="table table-white text-dark">
                <thead>
                    <tr>
                        <th scope="col">@lang('ID_Medecin')</th>
                        <th scope="col">@lang('Nom')</th>
                        <th scope="col">@lang('Prenom')</th>
                        <th scope="col">@lang('Num_tele')</th>
                        <th scope="col">@lang('specialite')</th>
                        <th scope="col">@lang('Modification')</th>
                        <th scope="col">@lang('Suppression')</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $us)

                <?php $spec = DB::table('specialites')->where('ID_specialite', $us->ID_specialite)->first();?>
                    <tr>
                        <td>{{ $us->ID_medecin }}</td>
                        <td>{{ $us->Nom }}</td>
                        <td>{{ $us->Prenom }}</td>
                        <td>{{ $us->Num_tele}}</td>
                        <td>{{ $spec->specialite}}</td>
                       
                        <td>
                            <a href="medecin/edit/{{$us->ID_medecin}}"><button class="btn btn-primary">Modifier</button></a></td>
                           
                         <td> <form action="{{route('medecin.destroy',$us->ID_medecin) }}"  method="POST">
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
