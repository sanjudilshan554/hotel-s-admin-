<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
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

Route::prefix('room-type')->group(function () {
    Route::get("/",[RoomTypeController::class,"index"])->name("roomType.index");
    Route::post("/store",[RoomTypeController::class,"store"])->name("roomType.store");
    Route::get("/all",[RoomTypeController::class,"all"])->name("roomType.all");
});

Route::prefix('hotel')->group(function (){
    Route::get("/",[HotelController::class,"index"])->name('hotel.index');
    Route::get("/edit",[HotelController::class,"edit"])->name('hotel.edit');
});

// need to be fix name
Route::prefix('hotel-types')->group(function (){
    Route::get('/',[HotelTypeController::class,'index'])->name('hotelType.index');
    Route::post('/store',[HotelTypeController::class,'store'])->name('hotelType.store');
    Route::get('/all',[HotelTypeController::class,'all'])->name('hotelType.all');
    Route::delete('/{hotel_type_id}/delete',[HotelTypeController::class,'delete'])->name('hotelType.delete');
    Route::get('/{hotel_type_id}/edit',[HotelTypeController::class,'edit'])->name('hotelType.edit');
    Route::get('/{hotel_id}/get',[HotelTypeController::class,'get'])->name('hotelType.get');
    Route::get('/{hotel_id}/delete',[HotelTypeController::class,'delete'])->name('hotelType.delete');
    Route::post('/{hotel_id}/update',[HotelTypeController::class,'update'])->name('hotelType.update');
});

require __DIR__ . '/auth.php';


Route::get('/', function () {
    return Inertia::render('Dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

