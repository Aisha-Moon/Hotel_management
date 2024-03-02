<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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





Route::get('/',[AdminController::class,'home']);
Route::get('/create_room',[AdminController::class,'create_room']);
Route::get('/view_room',[AdminController::class,'view_room']);
Route::get('/home',[AdminController::class,'index'])->name('home');
Route::post('/add_room',[AdminController::class,'add_room']);
Route::get('/delete_room/{id}',[AdminController::class,'delete_room']);
Route::get('/edit_room/{id}',[AdminController::class,'edit_room']);
Route::post('/update_room/{id}',[AdminController::class,'update_room']);

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'room_booking']);

