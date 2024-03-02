<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\Auth\LoginController;



/*Route::get('/auth', function () {
    return view('auth\dashboard');
}); */

Route::middleware(['auth'])->group(function () {

Route::get('/auth',[ChauffeurController::class,'auth']);
Route::get('/vehicule',[VehiculeController::class,'index']);
Route::get('/liste-vehicule',[VehiculeController::class,'liste'])->name('liste');
Route::post('/storevehicules',[VehiculeController::class,'store'])->name('enregistrerVehicule');
Route::get('/update-vehicule/{id}',[VehiculeController::class,'updatevehicule']);
Route::post('/updatestorevehicule',[VehiculeController::class,'updatestorevehicule']);
Route::get('/delete-vehicule/{id}',[VehiculeController::class,'deletevehicule']);


Route::get('/chauffeur',[ChauffeurController::class,'index']);
Route::get('/liste-chauffeur',[ChauffeurController::class,'liste'])->name('liste1');
Route::post('/storechauffeurs',[ChauffeurController::class,'store'])->name('enregistrerChauffeur');
Route::get('/update-chauffeur/{id}',[ChauffeurController::class,'updatechauffeur']);
Route::post('/updatestorechauffeur',[ChauffeurController::class,'updatestorechauffeur']);
Route::get('/delete-chauffeur/{id}',[ChauffeurController::class,'deletechauffeur']);

Route::get('/liste-client',[ClientController::class,'liste'])->name('liste3');
Route::post('/updatestoreclient',[ClientController::class,'updatestoreclient']);
Route::get('/delete-client/{id}',[ClientController::class,'deleteclient']);

Auth::routes();

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});




Route::get('/',[VehiculeController::class,'showVehicule']);





Route::get('/client',[ClientController::class,'index']);
Route::post('/storeclients',[ClientController::class,'store'])->name('enregistrerClient');
Route::get('/update-client/{id}',[ClientController::class,'updateclient']);
Route::get('/payement',[ClientController::class,'index2']);




Auth::routes();






Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
