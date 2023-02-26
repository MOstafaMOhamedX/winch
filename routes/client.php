<?php

use App\Http\Controllers\Client\HomeController;
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

Route::group(['as' => 'client.'], function () {
    Route::any('/', [HomeController::class, 'home'])->name('home');
});
