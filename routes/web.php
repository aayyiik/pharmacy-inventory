<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

//===== Admin
Route::get('/index', [AdminController::class, 'index']);

// User
Route::get('/users',[AdminController::class,'user'] );
Route::get('/users/create',[AdminController::class,'create']) ;
Route::get('users/{id}/edit', [AdminController::class,'edit']);
Route::post('users/{id}/update', [AdminController::class,'update']);
Route::get('users/{id}/delete', [AdminController::class,'delete']);
Route::get('users/trash',[AdminController::class,'trash']);
Route::get('users/{id}/restore',[AdminController::class,'restore']);
Route::get('users/{id}/forceDelete', [AdminController::class,'forceDelete']);


// Pegawai


