<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
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
Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register_post',[AuthController::class,'register_post']);

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login_post',[AuthController::class,'login_post']);

Route::get('logout', [AuthController::class, 'logout']);

// User
Route::get('/users',[AdminController::class,'user'] );
Route::get('/users/create',[AdminController::class,'create']);
Route::post('/users/store',[AdminController::class,'store']);
Route::get('users/edit/{id}', [AdminController::class,'edit']);
Route::post('users/update/{id}', [AdminController::class,'update']);
Route::get('users/delete/{id}', [AdminController::class,'delete']);
Route::get('users/trash',[AdminController::class,'trash']);
Route::get('users/{id}/restore',[AdminController::class,'restore']);
Route::get('users/{id}/forceDelete', [AdminController::class,'forceDelete']);

// category
Route::get('/category',[AdminController::class,'category'] );
Route::get('/category/create',[AdminController::class,'create_category']);
Route::post('/category/store',[AdminController::class,'store_category']);
Route::get('category/edit/{id}', [AdminController::class,'edit_category']);
Route::post('category/update/{id}', [AdminController::class,'update_category']);
Route::get('category/delete/{id}', [AdminController::class,'delete_category']);

// ======= Pegawai

// product
Route::get('/pharmacy',[PegawaiController::class,'pharmacy'] );
Route::get('/pharmacy/create',[PegawaiController::class,'create_pharmacy']);
Route::post('/pharmacy/store',[PegawaiController::class,'store_pharmacy']);
Route::get('pharmacy/edit/{id}', [PegawaiController::class,'edit_pharmacy']);
Route::post('pharmacy/update/{id}', [PegawaiController::class,'update_pharmacy']);
Route::get('pharmacy/delete/{id}', [PegawaiController::class,'delete_pharmacy']);

// supplier
Route::get('/supplier',[PegawaiController::class,'supplier'] );
Route::get('/supplier/create',[PegawaiController::class,'create_supplier']);
Route::post('/supplier/store',[PegawaiController::class,'store_supplier']);
Route::get('supplier/edit/{id}', [PegawaiController::class,'edit_supplier']);
Route::post('supplier/update/{id}', [PegawaiController::class,'update_supplier']);
Route::get('supplier/delete/{id}', [PegawaiController::class,'delete_supplier']);


//Barang Masuk

Route::get('/entry',[PegawaiController::class,'entry'] );
Route::get('/entry/create',[PegawaiController::class,'entry_create']);
Route::post('/entry/store',[PegawaiController::class,'store_entry']);
Route::get('entry/edit/{id}', [PegawaiController::class,'edit_entry']);
Route::post('entry/update/{id}', [PegawaiController::class,'update_entry']);
Route::get('entry/delete/{id}', [PegawaiController::class,'delete_entry']);

//Barang Keluar

Route::get('/out',[PegawaiController::class,'out'] );
Route::get('/out/create',[PegawaiController::class,'out_create']);
Route::post('/out/store',[PegawaiController::class,'store_out']);
Route::get('out/edit/{id}', [PegawaiController::class,'edit_out']);
Route::post('out/update/{id}', [PegawaiController::class,'update_out']);
Route::get('out/delete/{id}', [PegawaiController::class,'delete_out']);


