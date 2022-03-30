<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PersonnelController;   
use App\Http\Controllers\StatsController;  
use App\Http\Controllers\CongeController;  

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


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user',[AuthController::class,'user']);
    Route::post('logout',[AuthController::class,'logout']);
});
Route::get('stats',[StatsController::class,'index']);

Route::get('personnels',[PersonnelController::class,'index']);
Route::get('personnels/abse',[PersonnelController::class,'abse']);
Route::get('personnels/{PERS_MAT_95}',[PersonnelController::class,'show']);

Route::get('conge',[CongeController::class,'index']);
Route::get('conge/{PERS_MAT_95}',[CongeController::class,'show']);
Route::post('conge',[CongeController::class,'store']);