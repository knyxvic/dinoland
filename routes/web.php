<?php

use App\Http\Controllers\ClientController;
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
    return view('welcomeClients');
});

Route::get('/clients/register', function(){
    return view('clients.register');
})->name('clients/register');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/login',[\App\Http\Controllers\AdminController::class, 'index'])->name('login_from');

    Route::post('/login/owner',[\App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[\App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout')->middleware('admin');

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
    Route::resource('/produits', \App\Http\Controllers\ProduitController::class);
});

Route::prefix('client')->group(function () {

    Route::get('/login', [\App\Http\Controllers\ClientController::class, 'index'])->name('client_login_from');

    Route::get('/dashboard', [\App\Http\Controllers\ClientController::class, 'dashboard'])->name('client.dashboard');

    Route::get('/register', [\App\Http\Controllers\ClientController::class, 'showRegister'])->name('client.showRegister');
    Route::post('/register', [\App\Http\Controllers\ClientController::class, 'register'])->name('client.register');

    Route::post('/login/owner', [\App\Http\Controllers\ClientController::class, 'login'])->name('client.login');

    Route::get('/logout', [\App\Http\Controllers\ClientController::class, 'logout'])->name('client.logout');

    Route::get('/compte',[ClientController::class, 'compte'])->name('client.compte');
});

// Ne pas faire controller adresse ?
// TODO : revoir les suppressions
// TODO : voir si création adresse en meme temps que la creation personnel
//TODO : ajouter img produit

Route::get('/accueil', [\App\Http\Controllers\ProduitController::class, 'accueil'])->name('accueil');
Route::get('/categories/{id}', [\App\Http\Controllers\ProduitController::class, 'categorie'])->name('categories');
Route::get('/showProducts/{id}', [\App\Http\Controllers\ProduitController::class, 'showProduct'])->name('showProduct');

require __DIR__.'/auth.php';
