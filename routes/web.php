<?php

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

Route::resource('/caracteristiques', \App\Http\Controllers\CaracteristiqueController::class);
Route::resource('/categories', \App\Http\Controllers\CategorieController::class);
Route::resource('/especes', \App\Http\Controllers\EspeceController::class);
Route::resource('/nourritures', \App\Http\Controllers\NourritureController::class);
Route::resource('/typeEnclos', \App\Http\Controllers\TypeEnclosController::class);
Route::resource('/environnements', \App\Http\Controllers\EnvironnementController::class);
Route::resource('/climats', \App\Http\Controllers\ClimatController::class);
Route::resource('/typesPersonnels', \App\Http\Controllers\TypePersonnelController::class);
Route::resource('/pays', \App\Http\Controllers\PaysController::class);
Route::resource('/modesLivraisons', \App\Http\Controllers\ModeLivraisonController::class);
Route::resource('/statutsCommandes', \App\Http\Controllers\StatutCommandeController::class);
Route::resource('/taxes', \App\Http\Controllers\TaxeController::class);
Route::resource('/dinos', \App\Http\Controllers\DinoController::class);
Route::resource('/enclos', \App\http\Controllers\EnclosController::class);
Route::resource('/personnels', \App\http\Controllers\PersonnelController::class);

// Ne pas faire controller adresse ?

Route::view("/testMarket",'testMarket.index');
