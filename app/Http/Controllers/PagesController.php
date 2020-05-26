<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function medecin()
    {
        return view('Pages.medecin');
    }
    public function patient()
    {
        return view('Pages.patient');
    }
    public function admin()
    {
        return view('Pages.admin');
    }
    public function secretaire()
    {
        return view('Pages.secretaire');
    }
}
