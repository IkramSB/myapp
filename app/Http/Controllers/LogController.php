<?php

namespace App\Http\Controllers;

use App\authentification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password')
        ]))
        {
            $id =  Auth::user()->id;
            $user = authentification::find($id);
            if($user->is_admin())
            {
                return redirect()->route('admin');
            }
            else if($user->is_medecin())
            {
                return redirect()->route('medecin');
            }
            else if($user->is_patient())
            {
                return redirect()->route('patient');
            }
            else if($user->is_secretaire())
            {
                return redirect()->route('secretaire');
            }
            return redirect()->route('home');

        }
        else{
            echo "ça marche pas ";
        }
    }
}
