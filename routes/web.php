<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelImageController;
use App\Http\Controllers\HotelRoomesController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
 
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

Route::get("/dashboard",[HomeController::class,"index"])->name("dashboard");

// room types
Route::prefix('room-type')->group(function () {
    Route::get("/",[RoomTypeController::class,"index"])->name("roomType.index");
    Route::post("/store",[RoomTypeController::class,"store"])->name("roomType.store");
    Route::get("/all",[RoomTypeController::class,"all"])->name("roomType.all");
    Route::delete("/{room_type_id}/delete",[RoomTypeController::class,"delete"])->name("roomType.delete");
    Route::get("/{room_type_id}/edit",[RoomTypeController::class,"edit"])->name("roomType.edit");
    Route::get("/{room_type_id}/get",[RoomTypeController::class,"get"])->name("roomType.get");
    Route::post("/{room_type_id}/update",[RoomTypeController::class,"update"])->name("roomType.update");
    Route::get("/count",[RoomTypeController::class,"count"])->name("roomType.count");
    Route::delete("/select/hotel_types/delete",[RoomTypeController::class,"deleteSelectedItems"])->name('roomTypes.delete.selected');
});

// hotels
Route::prefix('hotel')->group(function (){
    Route::get("/",[HotelController::class,"index"])->name('hotel.index');
    Route::get("/all",[HotelController::class,"all"])->name('hotel.all');
    Route::post("/store",[HotelController::class,"store"])->name('hotels.store');
    Route::get("{hotel_id}/get",[HotelController::class,"get"])->name('hotels.get');
    Route::get("{hotel_id}/edit",[HotelController::class,"edit"])->name('hotels.edit');
    Route::get("/count",[HotelController::class,"count"])->name('hotels.count');
    Route::post("{hotel_id}/basic/update",[HotelController::class,"basicUpdate"])->name('hotels.basic.update');
    Route::delete("{hotel_id}/basic/delete",[HotelController::class,"basicDelete"])->name('hotels.basic.delete');
    Route::delete("/select/hotel/delete",[HotelController::class,"deleteSelectedItems"])->name('hotels.delete.selected');
});

// hotel types
Route::prefix('hotel-types')->group(function (){
    Route::get('/',[HotelTypeController::class,'index'])->name('hotelType.index');
    Route::post('/store',[HotelTypeController::class,'store'])->name('hotelType.store');
    Route::get('/all',[HotelTypeController::class,'all'])->name('hotelType.all'); 
    Route::delete('/{hotel_type_id}/delete',[HotelTypeController::class,'delete'])->name('hotelType.delete');
    Route::get('/{hotel_type_id}/edit',[HotelTypeController::class,'edit'])->name('hotelType.edit');
    Route::get('/{hotel_id}/get',[HotelTypeController::class,'get'])->name('hotelType.get');
    Route::get('/{hotel_type}/find',[HotelTypeController::class,'find'])->name('hotelType.find');
    Route::post('/{hotel_id}/update',[HotelTypeController::class,'update'])->name('hotelType.update');
    Route::get('/count',[HotelTypeController::class,'count'])->name('hotelType.count');
    Route::delete("/select/hotel_types/delete",[HotelTypeController::class,"deleteSelectedItems"])->name('hotelTypes.delete.selected');
});

// hotel images
Route::prefix('hotel-images')->group(function (){
    Route::post('/store',[HotelImageController::class,'store'])->name('hotel.image.store');
    Route::get('{hotel_id}/all',[HotelImageController::class,'all'])->name('hotel.image.all');
    Route::get('/{hootel_image_id}/delete',[HotelImageController::class,'delete'])->name('hotel_image.delete');
    Route::post('/update',[HotelImageController::class,'update'])->name('hotel.image.update');
});

// hotel rooms
Route::prefix('hotel-rooms')->group(function (){
    Route::post('/store',[HotelRoomesController::class,'store'])->name('hotel.rooms.store');
    Route::get('/{hotel_id}/edit',[HotelRoomesController::class,'edit'])->name('hotel.rooms.edit');
    Route::get('/{hotel_id}/get',[HotelRoomesController::class,'get'])->name('hotel.rooms.get');
    Route::get('/count',[HotelRoomesController::class,'count'])->name('hotel.rooms.count');
    Route::get('/{hotel_room_id}/delete',[HotelRoomesController::class,'delete'])->name('hotel.rooms.delete');
});
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return Inertia::render('Dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

