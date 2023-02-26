<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "dashboard" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'dashboard', 'as' => 'admin.'], function () {
      Route::any('/', [HomeController::class, 'home'])->name('home');
      Route::resources([
        'profile' => ProfileController::class,
        'admins' => AdminsController::class,
        'clients' => AdminsController::class,
        'drivers' => AdminsController::class,

    ]);
});



