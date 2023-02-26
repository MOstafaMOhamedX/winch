<?php

use App\Http\Controllers\Dashboard\AddressController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\ClientsController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\DriversController;
use App\Http\Controllers\Dashboard\FAQController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RegionController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Middleware\Localization;
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

Route::group(['middleware' => [Localization::class, 'role:Admin|Owner']], function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'admin.'], function () {
        Route::any('/', [HomeController::class, 'home'])->name('home');
        Route::resources([
            'profile' => ProfileController::class,
            'admins' => AdminsController::class,
            'drivers' => DriversController::class,
            'clients' => ClientsController::class,
            'client.addresses' => AddressController::class,
            'type.settings' => SettingController::class,
            'countries' => CountryController::class,
            'country.regions' => RegionController::class,
            'roles' => RoleController::class,
            'permissions' => PermissionController::class,
            'contacts' => ContactController::class,
            'coupons' => CouponController::class,
            'faq' => FAQController::class,

        ]);
    });
});
