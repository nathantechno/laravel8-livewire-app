<?php

 
use App\Models\Article;
use App\Http\Livewire\Utilisateurs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get(
//     '/habilitations/utilisateurs',
//     [App\Http\Controllers\UserController::class, 'index']
// )
//     ->name('utilisateurs')
//     ->middleware('auth.admin');
/**
 * Groupe route pour les  administrateurs uniquement
 */

Route::group([
    "middleware" => ["auth", "auth.admin"],
    "as" => "admin.",
], function () {
    Route::group([
        "prefix" => "habilitations",
        'as' => 'habilitations.'
    ], function(){

        Route::get("/utilisateurs", Utilisateurs::class)->name("users.index");
        

    });
});
