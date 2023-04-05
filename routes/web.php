<?php

use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//reservation submit
Route::post('/reservation', [App\Http\Controllers\HomeController::class, 'reserve'])->name('reservation.reserve');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('slider', SliderController::class);
    //category controller
    Route::resource('category', categoryController::class);
    //Item controller
    Route::resource('item', ItemController::class);
    //reservation controller admin
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('/reservation/delete/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::post('/reservation/status/{id}', [ReservationController::class, 'status'])->name('reservation.status');
});

// Route::get('/restaurants',[RestaurantController::class, 'index']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
