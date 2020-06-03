<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('/log', [
    'uses' => 'LogController@login',
    'as' => 'log'
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/medecin','PagesController@medecin')->name('medecin');
Route::get('/patient','PagesController@patient')->name('patient');
Route::get('/admin','PagesController@admin')->name('admin');
Route::get('/secretaire','PagesController@secretaire')->name('secretaire');

Route::resource('lepatient', 'PatientController');
Route::resource('lemedecin', 'MedecinController');

Route::resource('patient/dossier','DossierController');

Route::resource('userpatient', 'UController');