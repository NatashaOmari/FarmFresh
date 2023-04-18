<?php

use App\Http\Controllers\ApiFloraController;
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
Route::get('floras',[ApiFloraController::class,'index']);
Route::get('flora/{id}',[ApiFloraController::class,'show']);
Route::post('create',[ApiFloraController::class,'store']);
Route::put('flora/{id}',[ApiFloraController::class,'update']);
Route::delete('flora/{id}',[ApiFloraController::class,'delete']);