<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/pharmacy',[PegawaiController::class,'pharmacy'] );
Route::post('/pharmacy/store',[PegawaiController::class,'store_pharmacy']);
Route::post('pharmacy/update/{id}', [PegawaiController::class,'update_pharmacy']);
Route::get('pharmacy/edit/{id}', [PegawaiController::class,'edit_pharmacy']);
Route::get('pharmacy/delete/{id}', [PegawaiController::class,'delete_pharmacy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
