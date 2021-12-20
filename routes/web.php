<?php

use App\Http\Controllers\AcLandController;
use App\Http\Controllers\AdcController;
use App\Http\Controllers\AdcRevinewController;
use App\Http\Controllers\Admin\BondobostoAppController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DcController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

    // profile section here
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.show');
    Route::put('profile-update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dhorkhasto/{id}', [HomeController::class, 'showApplication'])->name('show.app');
    // every doc showing using this route...
    Route::get('/doc-show', [HomeController::class, 'docShow'])->name('doc.show');
    Route::get('/app-edit/{id}', [HomeController::class, 'editApplication'])->name('edit.app');
    // Ac Land Section Here..
    Route::get('/ac-land', [AcLandController::class, 'index'])->name('ac-land');
    Route::put('ac-land-to-any/{id}', [AcLandController::class, 'sendToAny'])->name('ac-land.to.any');
    Route::get('ac-land-to-uno/{id}', [AcLandController::class, 'sendToUno'])->name('ac-land.to.uno');

    // Towswhilder Section Here..
    Route::get('/towshilder', [TowshilderController::class, 'index'])->name('towshilder');
    Route::put('towshilder-to-acland/{id}', [TowshilderController::class, 'sendToAny'])->name('towshilder.to.AcLand');

    // Uno Section Here..
    Route::get('/uno', [UnoController::class, 'index'])->name('uno');
    Route::put('uno-to-dc/{id}', [UnoController::class, 'sendToAny'])->name('uno.to.dc');

    // DC Section Here..
    Route::get('/dc', [DcController::class, 'index'])->name('dc');
    Route::put('dc-to-adc/{id}', [DcController::class, 'sendToAny'])->name('dc.to.adc');

    // ADC Section Here..
    Route::get('/adc', [AdcController::class, 'index'])->name('adc');
    Route::put('adc-to-adc_revinew/{id}', [AdcController::class, 'sendToAny'])->name('dc.to.adc_revinew');

    // DC Section Here..
    Route::get('/adc_revinew', [AdcRevinewController::class, 'index'])->name('adc-revinew');
    Route::put('adc-revinew-to-acland/{id}', [AdcRevinewController::class, 'sendToAny'])->name('adc_revinew.to.acland');

});

// application frontend Secton here
Route::resource('application', BondobostoAppController::class);

// geting unions using ajax request for application form..
Route::get('get-unions/{id}', [BondobostoAppController::class, 'getUnion'])->name('get.union');
