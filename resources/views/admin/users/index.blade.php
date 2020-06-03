@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liste des Patients</div>
        <div class="table-responsive">
            <table class="table table-white text-dark">
                <thead>
                    <tr>
                        <th scope="col">@lang('ID_patient')</th>
                        <th scope="col">@lang('Nom')</th>
                        <th scope="col">@lang('Prenom')</th>
                        <th scope="col">@lang('Num_tele')</th>
                        <th scope="col">@lang('CIN')</th>
                        <th scope="col">@lang('Num_assurance')</th>
                        <th scope="col">@lang('Modification')</th>
                        <th scope="col">@lang('Suppression')</th>
                    
                    </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr>
                        <td>{{ $us->ID_patient }}</td>
                        <td>{{ $us->Nom }}</td>
                        <td>{{ $us->Prenom }}</td>
                        <td>{{ $us->Num_tele}}</td>
                        <td>{{ $us->CIN}}</td>
                        <td>{{ $us->Num_assurance}}</td>
                        <td>
                            <a href="userpatient/{{$us->ID_patient}}/edit"><button class="btn btn-primary">Modifier</button></a></td>
                           
                         <td> <form action="{{route('userpatient.destroy',$us->ID_patient) }}"  method="POST">
                         {{ csrf_field() }}
                     <input type="hidden" name="_method" value="DELETE">
                     <button type="submit" class="btn btn-danger" >DELETE</button>
                     </form>
                     </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
@endsection 