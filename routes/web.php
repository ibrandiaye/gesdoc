<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FichierController;
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

Route::get('/', [FichierController::class,'allFichier'])->name("home");
Route::resource('fichier', FichierController::class)->middleware("auth");

Route::get('/home', function () {
    return view('home');
})->name("homecl");
Route::resource('categorie', CategorieController::class)->middleware("auth");


Route::get('/get-by-name', [FichierController::class,'getByName'])->name("byname");


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
