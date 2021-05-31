<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HealthFacilityController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZoneController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});
Route::group(['prefix' =>'admin'], function () {
    Route::get('/{facility}', [HealthFacilityController::class, 'dashboard'])->name('facility.dashboard');
    
});

Route::prefix('master')->group(function () {
    Route::get('/', [MasterController::class, 'index'])->name('master.dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admins');
    Route::get('/facility', [HealthFacilityController::class, 'index'])->name('facilities');
    Route::get('/facility/add', [HealthFacilityController::class, 'create'])->name('facility.add');
    Route::post('/facility/add', [HealthFacilityController::class, 'store']);
    Route::get('/zone', [ZoneController::class, 'index'])->name('zones');
    Route::get('/zone/add', [ZoneController::class,'create'])->name('zone.add');
    Route::post('/zone/add', [ZoneController::class,'store']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
