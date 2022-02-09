<?php

use App\Http\Controllers\Admin\AcLandController;
use App\Http\Controllers\Admin\AdcController;
use App\Http\Controllers\Admin\AdcRevinewController;
use App\Http\Controllers\Admin\ApplicationApiController;
use App\Http\Controllers\Frontend\BondobostoAppController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Admin\AppSendController;
use App\Http\Controllers\Admin\DcController;
use App\Http\Controllers\Frontend\ApplicationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RunningController;
use App\Http\Controllers\Admin\TowshilderController;
use App\Http\Controllers\Admin\UnoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index']);

Auth::routes();
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // user section here
    Route::resource('user', UserController::class)->middleware('can:manage-users');

    // profile section here
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('profile.show');
    Route::put('profile-update/{id}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/dhorkhasto/{id}', [HomeController::class, 'showApplication'])->name('show.app');
    // every doc showing using this route...
    Route::get('/doc-show', [HomeController::class, 'docShow'])->name('doc.show');
    Route::get('/app-edit/{id}', [HomeController::class, 'editApplication'])->name('edit.app');

    // running application route here
    Route::get('/running-application/{id}', [RunningController::class, 'index'] )->name('running.app');
    // Ac Land Section Here..
    Route::get('/ac-land', [AcLandController::class, 'index'])->name('ac-land');
    Route::put('ac-land-to-any/{id}', [AcLandController::class, 'sendToAny'])->name('ac-land.to.any');
    Route::get('ac-land-to-uno/{id}', [AcLandController::class, 'sendToUno'])->name('ac-land.to.uno');
    Route::put('send-to-nothi/{id}', [AcLandController::class, 'sendToNothi'])->name('ac-land.to.nothi');

    // Towswhilder Section Here..
    Route::get('/towshilder', [TowshilderController::class, 'index'])->name('towshilder');
    Route::put('towshilder-to-acland/{id}', [TowshilderController::class, 'sendToAny'])->name('towshilder.to.AcLand');

    // Uno Section Here..
    Route::get('/uno', [UnoController::class, 'index'])->name('uno');
    Route::put('uno-to-dc/{id}', [UnoController::class, 'sendToAny'])->name('uno.to.dc');
    // optimize route here

    // DC Section Here..
    Route::get('/dc', [DcController::class, 'index'])->name('dc');
    Route::put('dc-to-adc/{id}', [DcController::class, 'sendToAny'])->name('dc.to.adc');

    // ADC Section Here..
    Route::get('/adc', [AdcController::class, 'index'])->name('adc');
    Route::put('adc-to-adc_revinew/{id}', [AdcController::class, 'sendToAny'])->name('dc.to.adc_revinew');

    // DC Section Here..
    Route::get('/adc_revinew', [AdcRevinewController::class, 'index'])->name('adc-revinew');
    Route::put('adc-revinew-to-acland/{id}', [AdcRevinewController::class, 'sendToAny'])->name('adc_revinew.to.acland');

    // showing app_sends single page data
    Route::get('app-sends/{id}', [AppSendController::class, 'appSends'])->name('app.sends');

    // ajax apis route here..
    Route::get('/applications-list', [ApplicationApiController::class, 'get_applications'])->name('applications');

});

// show unoion and upazila page for bondobosto app
Route::get('bondobosto', [ApplicationController::class, 'index'])->name('bondobosto-app');
Route::get('bondobosto/show', [ApplicationController::class, 'show'])->name('bondobosto-app.show');
// application frontend Secton here
Route::resource('application', BondobostoAppController::class);

// geting unions using ajax request for application form..
Route::get('get-unions/{id}', [BondobostoAppController::class, 'getUnion'])->name('get.union');
Route::get('/optimize', function () {
    Artisan::call('optimize');
    return "Cache is cleared";
})->name('optimize');

// cache clear route
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
