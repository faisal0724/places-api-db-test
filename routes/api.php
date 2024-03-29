<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FacilityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(Request $request){
    return response()->json(["data"=>"Hello API"]);

});

Route::get('/goodbye/{name}', function(Request $request, $name){
    return response()->json(["date"=>"Good Bye ".$name]);
});

Route::post('/info', function(Request $request){
    return response()->json(["data"=>"Hello ".$request["name"].".You are ".$request["age"]." years old"]);
});

Route::post('/hotels', [HotelController::class,'store']);

Route::get('/hotels', [HotelController::class,'index']);

Route::get('/hotels/{id}', [HotelController::class,'show']);

Route::put('/hotels/{id}', [HotelController::class, 'update']);

Route::delete('/hotels/{id}', [HotelController::class,'delete']);

Route::post('/hotels/{hotelId}/reviews', [ReviewController::class, 'store']);

Route::post('/facilities', [FacilityController::class, 'store']);

Route::get('/facilities', [FacilityController::class, 'index']);