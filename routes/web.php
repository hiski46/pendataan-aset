<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailAssetController;
use App\Http\Controllers\KodefikasiAsetController;
use App\Http\Controllers\KodefikasiLokasiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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


Route::get('/login', [AuthController::class, 'halamanLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/migrate', function () {
    Artisan::call('migrate:refresh');
});
Route::get('/seed', function () {
    Artisan::call('db:seed');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AssetController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::resource('user', UserController::class);
    Route::resource('kodefikasi_aset', KodefikasiAsetController::class);
    Route::resource('kodefikasi_lokasi', KodefikasiLokasiController::class);
    Route::resource('asset', AssetController::class);

    Route::get('/kia/{type}', [DetailAssetController::class, 'kia']);
    Route::get('/edit-detail/{type}/{asset}', [DetailAssetController::class, 'editDetail']);
    Route::post('/detail-asset/{type}/{asset}', [DetailAssetController::class, 'save']);
    Route::get('/export', [DetailAssetController::class, 'export']);
});
