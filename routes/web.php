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

Route::get('/our_room',[HomeController::class,'our_room']);
Route::get('/hotel_gallery',[HomeController::class,'hotel_gallery']);
Route::get('/contact_us',[HomeController::class,'contact_us']);
Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'room_booking']);
Route::get('bookings',[AdminController::class,'bookings'])->middleware('auth','admin');
Route::get('booking/delete/{id}',[AdminController::class,'bookings_delete']);
Route::get('approve_booking/{id}',[AdminController::class,'approve_booking']);
Route::get('reject_booking/{id}',[AdminController::class,'reject_booking']);
Route::get('view_gallery',[AdminController::class,'view_gallery']);
Route::post('upload_gallery',[AdminController::class,'upload_gallery']);
Route::get('delete_gallery/{id}',[AdminController::class,'delete_gallery']);
Route::get('message',[AdminController::class,'message']);
Route::get('send_mail/{id}',[AdminController::class,'send_mail']);
Route::post('mail/{id}',[AdminController::class,'mail']);

Route::post('/contact',[HomeController::class,'contact']);
