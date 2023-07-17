<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; 

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


//Order Table Data Get Api Route *******************
Route::get('order',[HomeController::class,'order']);
//************************************************ */




//Order Table Post Api TO order item ***********************
Route::post('order',[HomeController::class,'addorder']);
//*********************************************************** */




//Order Table Fetch Data Specific user using Id

Route::get('order/{id}',[HomeController::class,'showorder']);

//************************************************* */




//Update  Data Using API ***************

Route::get('order/{id}/edit',[HomeController::class,'edit']);

//Update

Route::put('order/{id}/edit',[HomeController::class,'update']);

//******************************************** */




//Delete Record API**********************
Route::delete('order/{id}/destroy',[HomeController::class,'destroy']);
//******************************************* */


