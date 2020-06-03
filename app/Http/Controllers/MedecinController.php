<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\authentification;
use App\medecin;
use App\image;


class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.formulairemed');
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
        if($request->hasFile('image')){
            $filenameWithExt =$request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);

        } else{
             $fileNameToStore='noimage.jpg';
        }



        $img= new image;
        $img->image=$fileNameToStore;
        $img->save();


        $user=new medecin;
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->email = $request->input('login');
        $user->addresse = $request->input('addresse');
        $user->Telephone = $request->input('Telephone');
        $user->ID_specialite = $request->input('specialite');
        $user->ID_image=$img->ID_image;
        $user->save();

        $auth=new authentification;
        $auth->id_user = medecin::max('ID_medecin');
        $auth->role='medecin';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();

        

        return redirect('/admin');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
