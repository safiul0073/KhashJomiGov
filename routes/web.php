<?php

use App\Http\Controllers\AcLandController;
use App\Http\Controllers\AdcController;
use App\Http\Controllers\AdcRevinewController;
use App\Http\Controllers\Admin\BondobostoAppController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DcController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TowshilderController;
use App\Http\Controllers\UnoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);

Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // user section here
    Route::resource('user', UserController::class);

    Route::get('/dhorkhasto/{id}', [HomeController::class, 'showApplication'])->name('show.app');
    Route::get('/app-edit/{id}', [HomeController::class, 'editApplication'])->name('edit.app');
    // Ac Land Section Here..
    Route::get('/ac-land', [AcLandController::class, 'index'])->name('ac-land');
    Route::put('ac-land-to-any/{id}', [AcLandController::class, 'sendToAny'])->name('ac-land.to.any');
    Route::get('ac-land-to-uno/{id}', [AcLandController::class, 'sendToUno'])->name('ac-land.to.uno');

    // Towswhilder Section Here..
    Route::get('/towshilder', [TowshilderController::class, 'index'])->name('towshilder');
    Route::get('/towshilder-to-acland/{id}', [TowshilderController::class, 'sendToToAcLand'])->name('towshilder.to.AcLand');

    // Uno Section Here..
    Route::get('/uno', [UnoController::class, 'index'])->name('uno');
    Route::get('/uno-to-dc/{id}', [UnoController::class, 'sendToToAcLand'])->name('uno.to.dc');

    // DC Section Here..
    Route::get('/dc', [DcController::class, 'index'])->name('dc');
    Route::get('/dc-to-adc/{id}', [DcController::class, 'sendToToAdc'])->name('dc.to.adc');

    // ADC Section Here..
    Route::get('/adc', [AdcController::class, 'index'])->name('adc');
    Route::get('/adc-to-adc_revinew/{id}', [AdcController::class, 'sendToToAdcRevinew'])->name('dc.to.adc_revinew');
    // DC Section Here..
    Route::get('/adc_revinew', [AdcRevinewController::class, 'index'])->name('adc-revinew');
    // Route::get('/dc-to-adc/{id}', [AdcRevinewController::class, 'sendToToAdc'])->name('dc.to.adc');

    // every doc showing using this route...
    Route::get('doc-show', [BondobostoAppController::class, 'docShow'])->name('doc-show');
});



// application frontend Secton here
Route::resource('application', BondobostoAppController::class);

// geting unions using ajax request for application form..
Route::get('get-unions/{id}', [BondobostoAppController::class, 'getUnion'])->name('get.union');
