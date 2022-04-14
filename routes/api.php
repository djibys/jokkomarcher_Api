<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("register_client" , [ClientController::class , "register"]);
Route::post("login", [ClientController::class, "login"]);
Route::post("register_fournisseur" , [FournisseurController::class , "register"]);
Route::post("login_fournisseur", [FournisseurController::class, "login"]);

Route::group(["Middleware"=>["auth::sanctum"]], function(){

    Route::get("profil_fournisseur" , [FournisseurController::class, "profil"]);
});

