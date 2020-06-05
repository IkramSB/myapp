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





//gestion des patient
Route::resource('admin/users/patient', 'UsersController');


//gestion des medecins
Route::get('admin/users/medecin', 'UsersController@index2');
Route::get('admin/users/medecin/create','UsersController@create2');
Route::post('admin/users/medecin/store','UsersController@store2')->name('medecin.store');
Route::get('admin/users/medecin/edit/{id}','UsersController@edit2');
Route::get('admin/users/medecin/destroy/{id}','UsersController@destroy2')->name('medecin.destroy');
Route::get('admin/users/medecin/update/{id}','UsersController@update2')->name('medecin.update');



//gestion des secretaires
Route::get('admin/users/secretaire', 'UsersController@index3');
Route::get('admin/users/secretaire/create','UsersController@create3');
Route::post('admin/users/secretaire/store','UsersController@store3')->name('secretaire.store');
Route::get('admin/users/secretaire/edit/{id}','UsersController@edit3');
Route::get('admin/users/secretaire/destroy/{id}','UsersController@destroy3')->name('secretaire.destroy');
Route::get('admin/users/secretaire/update/{id}','UsersController@update3')->name('secretaire.update');
