<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard-2', function () {
        return view('theme.sample');
    })->name('dashboard-2');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::controller(\App\Http\Controllers\CustomerController::class)->group(function () {
        Route::get('/customer/create', 'create')->name('customer.create');
        Route::post('/customer', 'store')->name('customer.store');
        Route::get('/customer/{customer}', 'show')->name('customer.show');
    });

    Route::controller(\App\Http\Controllers\GuaranteeController::class)->group(function () {
        Route::get('/customer/{customer}/guarantee', 'index')->name('guarantee.index');
    });

    Route::controller(\App\Http\Controllers\OtherGuaranteeController::class)->group(function () {
        Route::get('/customer/{id}/otherGuarantee', 'index')->name('otherGuarantee.index');
    });

    Route::controller(\App\Http\Controllers\InsuranceController::class)->group(function () {
        Route::get('/customer/{customer}/insurance', 'index')->name('insurance.index');
    });

    Route::controller(\App\Http\Controllers\InsuranceClaimController::class)->group(function () {
        Route::get('/customer/{customer}/insuranceClaim', 'index')->name('insuranceClaim.index');
    });

    Route::controller(\App\Http\Controllers\LitigationController::class)->group(function () {
        Route::get('/customer/{customer}/litigation', 'index')->name('litigation.index');
    });

    Route::controller(\App\Http\Controllers\InstallmentController::class)->group(function () {
        Route::get('/customer/{customer}/installment', 'index')->name('installment.index');
    });


});


