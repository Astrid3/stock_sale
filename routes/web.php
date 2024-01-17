<?php

use App\Models\Entree;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController ;
use App\Http\Controllers\Admin\CaisseController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\EntreeController;
use App\Http\Controllers\Admin\VenteController ;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\VendeurController;
use App\Http\Controllers\Vendeur\VenteController as Vente ;
use App\Http\Controllers\Superadmin\UserController as User ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->middleware('auth', 'admin')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/vendeurs', VendeurController::class);
    Route::resource('/clients ', ClientController::class);
    Route::resource('/ventes ', VenteController::class);
    Route::resource('/produits ', ProduitController::class);
    Route::resource('/caisse ', CaisseController::class);
    Route::resource('/entrees ', EntreeController::class);
    Route::get('entrees/{entree} ', [EntreeController::class,'showentree']); 
    Route::get('/produits ', [ProduitController::class,'index']);
    Route::get('/ventes-vendeur', [VenteController::class,'venteVendeur'])->name('ventes.vendeur');
    Route::get('/ventes-vendeur/{user}', [VenteController::class,'showVendeur'])->name('ventes.showvendeur');
    Route::get('/produits/create ', [ProduitController::class,'create']);
    Route::get('/clients/create ', [ClientController::class,'create']);
    Route::post('/clients/store ', [ClientController::class,'store']);
    Route::post('/produits/store', [ProduitController::class,'store']);
    Route::get('edit/ventes-vendeur/{user}', [VenteController::class,'EditVentevendeur'])->name('ventes.editvendeur');
    Route::post('put/ventes-vendeur/{user}', [VenteController::class,'UpdateVentevendeur'])->name('ventes.putvendeur');
    Route::get('delete/ventes-vendeur/{user}', [VenteController::class,'Deletevendeur'])->name('ventes.delvendeur');
});

Route::prefix('/superadmin')->middleware(['auth', 'superadmin'])->name('superadmin.')->namespace('Superadmin')->group(function () {
    Route::resource('/users', User::class); // Route assigned name "admin.users"...

});

Route::prefix('vendeur')->middleware('auth', 'vendeur')->name('vendeur.')->group(function () {
    Route::resource('/ventes', Vente::class);
    
});
