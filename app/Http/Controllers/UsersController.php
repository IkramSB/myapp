<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\patient;
use App\medecin;
use App\authentification;
use App\image;
use App\secretaire; 

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    //-------------------------------------------------GESTION DES PATIENTS------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = patient::all();
      return view('admin.gestion_patient.index')->with('user', $user);
        
    }

    /**
      
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion_patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new patient;
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->CIN = $request->input('CIN');
        $user->Num_assurance = $request->input('Num_assurance');
        $user->Num_tele = $request->input('Num_tele');
        $user->save();
        
        

        $auth=new authentification;
        $auth->id_user = patient::max('ID_patient');
        $auth->role='patient';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();

        redirect('admin/users/patient');
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
        return view('admin.gestion_patient.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=patient::find($id);
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->CIN = $request->input('CIN');
        $user->Num_assurance = $request->input('Num_assurance');
        $user->Num_tele = $request->input('Num_tele');
        $user->save();

        $auth=authentification::where('role','=','patient')->where('id_user',$id)->first();
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();
 
        return redirect('admin/users/patient');
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
        $auth = authentification::where('role','=','patient')->where('id_user',$ID)->first();
        $user->delete();
        $auth->delete();
       return redirect('admin/users/patient');


    }



















    //  ----------------------------------------------GESTION DES MEDECINS----------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $user=medecin::all();
        return view('admin.gestion_medecin.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2()
    {
        return view('admin.gestion_medecin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
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
        $user->ville=$request->input('Ville');
        $user->save();

        $auth=new authentification;
        $auth->id_user = medecin::max('ID_medecin');
        $auth->role='medecin';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();

        

        return redirect('admin/users/medecin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit2($id)
    {
        $user=medecin::find($id);
        return view('admin.gestion_medecin.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request, $id)
    {
        
        $user=medecin::find($id);
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->email = $request->input('login');
        $user->addresse = $request->input('addresse');
        $user->Telephone = $request->input('Telephone');
        $user->ID_specialite = $request->input('specialite');
        $user->ville=$request->input('Ville');
        if($request->hasFile('image')){
            $filenameWithExt =$request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/images',$fileNameToStore);
            $img= image::where('ID_image',$user->ID_image)->first();
            $img->image=$fileNameToStore;
            $img->save();
            $user->ID_image=$img->ID_image;
        } 

        $user->save();

        $auth=authentification::where('role','=','medecin')->where('id_user',$id)->first();
        $auth->id_user = $user->ID_medecin;
        $auth->role='medecin';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();

        return redirect('admin/users/medecin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy2($id)
    {
        $user = medecin::find($id);
        $auth = authentification::where('role','=','medecin')->where('id_user',$id)->first();
        $img=image::where('ID_image',$user->ID_image);
        $user->delete();
        $auth->delete();
        $img->delete();
       return redirect('admin/users/medecin');
    }















//------------------------------------------------------GESTION DES SECRETAIRES-------------------------------


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index3()
    {
        $user=secretaire::all();
        return view('admin.gestion_secretaire.index')->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create3()
    {
        return view('admin.gestion_secretaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store3(Request $request)
    {
        $user=new secretaire;
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->telephone = $request->input('Telephone');
        $user->save();
        
        
        
        $auth=new authentification;
        $auth->id_user = secretaire::max('ID_secretaire'); 
        $auth->role='secretaire';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();
 
        return redirect('admin/users/secretaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show3($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit3($id)
    {
        $user=secretaire::find($id);
        return view('admin.gestion_secretaire.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update3(Request $request, $id)
    {
        
        $user=secretaire::find($id);
        $user->Nom = $request->input('Nom');
        $user->Prenom = $request->input('Prenom');
        $user->telephone = $request->input('Telephone');
        $user->save();

        $auth=authentification::where('role','=','secretaire')->where('id_user',$id)->first();
        $auth->id_user = $user->ID_secretaire;
        $auth->role='secretaire';
        $auth->login = $request->input('login');
        $pwd= $request->input('password');
        $auth->password= Hash::make($pwd);
        $auth->save();
 
      

        return redirect('admin/users/secretaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy3($id)
    {
        $user = secretaire::find($id);
        $auth = authentification::where('role','=','secretaire')->where('id_user',$id)->first();
        $user->delete();
        $auth->delete();
       return redirect('admin/users/secretaire');
    }
}




