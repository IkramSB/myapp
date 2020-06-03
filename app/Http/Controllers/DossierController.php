<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dossiermedical;
use Illuminate\Support\Facades\Auth;
use App\authentification;


class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossier= dossiermedical::where('ID_patient',Auth::id() )->get();
        return view('patient.dossier.index')->with('dossier',$dossier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.dossier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossier= new dossiermedical;
        $dossier->Date_Naissance=$request->input('Date_naissance');
        $dossier->Sexe=$request->input('sexe');
        $dossier->Taille=$request->input('taille');
        $dossier->Poids=$request->input('poids');
        $dossier->Maladie_chronique=$request->input('Maladie_chronique');
        $dossier->Maladies_antecedentes=$request->input('Maladies_antecedentes');
        $dossier->Type_sanguin=$request->input('Type_sang');
        $dossier->Allergie=$request->input('Allergie');
        $dossier->Nouveau_symptome=$request->input('Nouveau_symptome');
        $dossier->Medicaments_utilises=$request->input('Medicaments_utilises');
        $dossier->ID_patient=auth::id();

        $dossier->save();

        return redirect('patient/dossier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossier=dossiermedical::find($id);
        return view('patient.dossier.edit')->with('dossier',$dossier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $dossier=dossiermedical::find($id);
        $dossier->Date_Naissance=$request->input('Date_naissance');
        $dossier->Sexe=$request->input('sexe');
        $dossier->Taille=$request->input('taille');
        $dossier->Poids=$request->input('poids');
        $dossier->Maladie_chronique=$request->input('Maladie_chronique');
        $dossier->Type_sanguin=$request->input('Type_sang');
        $dossier->Allergie=$request->input('Allergie');
        $dossier->Maladies_antecedentes=$request->input('Maladies_antecedentes');
        $dossier->Nouveau_symptome=$request->input('Nouveau_symptome');
        $dossier->Medicaments_utilises=$request->input('Medicaments_utilises');
        $dossier->ID_patient=auth::id();

        $dossier->save();

        return redirect('patient/dossier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doss=dossiermedical::find($id);
        $doss->delete();
        return redirect('patient/dossier');
       
    }

    
}
