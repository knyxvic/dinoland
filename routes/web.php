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
Route::resource('/especes', \App\Http\Controllers\EspeceController::class);
Route::resource('/nourritures', \App\Http\Controllers\NourritureController::class);
Route::resource('/typeEnclos', \App\Http\Controllers\TypeEnclosController::class);
Route::resource('/climats', \App\Http\Controllers\ClimatController::class);
Route::resource('/environnements', \App\Http\Controllers\EnvironnementController::class);
Route::resource('/typePersonnels', \App\Http\Controllers\TypePersonnelController::class);
Route::resource('/pays', \App\Http\Controllers\PaysController::class);
Route::resource('/modeLivraisons', \App\Http\Controllers\ModeLivraisonController::class);
Route::resource('/statutCommandes', \App\Http\Controllers\StatutCommandeController::class);
Route::resource('/taxes', \App\Http\Controllers\TaxeController::class);
Route::resource('/categories', \App\Http\Controllers\CategorieController::class);
