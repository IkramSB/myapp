<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use App\patient;
use App\authentification;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class UController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    { 
        $this->middleware('auth');
    }

    public function index()
    {
       $user = patient::all();
      return view('admin.users.index')->with('user', $user);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=patient::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=patient::find($id);
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->CIN = $request->input('CIN');
        $user->Num_assurance = $request->input('Num_assurance');
        $user->Num_tele = $request->input('Num_tele');
        $user->save();

        $auth=authentification::where('id_user',$id)->first();
        $auth->id_user = patient::max('ID_patient');
        $auth->role='patient';
        $auth->login = $request->input('login');
        $auth->save();
 
        return redirect('/admin');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $user = patient::find($ID);
        $auth=authentification::where('id_user',$ID)->first();
        $auth->delete();
        $user->delete();
        return redirect('/admin');


    }
}

