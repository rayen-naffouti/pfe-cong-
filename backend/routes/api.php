<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PersonnelController;   
use App\Http\Controllers\StatsController;  

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

Route::get('stats',[StatsController::class,'index']);

Route::get('personnels',[PersonnelController::class,'index']);
Route::get('personnels/abse',[PersonnelController::class,'abse']);
Route::get('personnels/{PERS_MAT_95}',[PersonnelController::class,'show']);

