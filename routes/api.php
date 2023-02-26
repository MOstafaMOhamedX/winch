<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{
    AuthController,
    SettingController,
    HomeController
};


use App\Http\Controllers\API\driver\{
    AuthController as AuthDriverController,
};



//client
Route::prefix('/{lang}')->group(function () {

    Route::GET('/', [AuthController::class,'lang'])->name('lang');
    Route::GET('/home', [HomeController::class,'index'])->name('APIHome');

    Route::GET('contact ', [SettingController::class, 'contact']);
    Route::GET('privacy', [SettingController::class, 'privacy']);
    Route::GET('about ', [SettingController::class, 'about']);
    Route::GET('terms ', [SettingController::class, 'terms']);
    Route::GET('support ', [SettingController::class, 'support']);

    Route::POST('login', [AuthController::class, 'Login']);
    Route::POST('register', [AuthController::class, 'Register']);
    Route::POST('profile', [AuthController::class, 'UpdateProfile']);
    Route::POST('logout', [AuthController::class, 'Logout']);
    Route::POST('delete-account', [AuthController::class, 'DeleteAccount']);
    Route::POST('sendotp', [AuthController::class, 'Sendotp']);
    Route::POST('check_number', [AuthController::class, 'CheckNumber']);
    Route::POST('tokens', [AuthController::class, 'DeviceToken']);
});



//driver
Route::prefix('/{lang}/driver')->group(function () {

    Route::POST('login', [AuthDriverController::class, 'Login']);
    Route::POST('register', [AuthDriverController::class, 'Register']);
    Route::POST('profile', [AuthDriverController::class, 'UpdateProfile']);
    Route::POST('logout', [AuthDriverController::class, 'Logout']);
    Route::POST('delete-account', [AuthDriverController::class, 'DeleteAccount']);
    Route::POST('sendotp', [AuthDriverController::class, 'Sendotp']);
    Route::POST('check_number', [AuthDriverController::class, 'CheckNumber']);
    Route::POST('tokens', [AuthDriverController::class, 'DeviceToken']);
});
