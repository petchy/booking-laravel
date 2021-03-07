<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\ServiceRoomTypeController;
use App\Http\Controllers\CheckBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CheckBookingController::class, 'index']);
Route::get('/service', [ServiceController::class, 'index']);
Route::get('/room-type', [RoomTypeController::class, 'index']);
Route::get('/service-room-type', [ServiceRoomTypeController::class, 'index']);
Route::get('/check-booking', [CheckBookingController::class, 'index']);
Route::post('/check-booking', [CheckBookingController::class, 'store'])->name('checkBooking');
Route::post('/service/add', [ServiceController::class, 'store'])->name('addService');
Route::post('/room-type/add', [RoomTypeController::class, 'store'])->name('addRoomType');
Route::post('/service-room-type/add', [ServiceRoomTypeController::class, 'store'])->name('addServiceRoomType');


