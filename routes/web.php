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
        Route::get('/customer/create', 'create');
    });

    Route::controller(\App\Http\Controllers\GuaranteeController::class)->group(function () {
//        Route::get('/customer/{id}/guarantee', 'index');
        Route::get('/customer/guarantee/create', 'create');
    });


    Route::controller(\App\Http\Controllers\OtherGuaranteeController::class)->group(function () {
//        Route::get('/customer/{id}/otherGuarantee', 'index');
        Route::get('/customer/otherGuarantee/create', 'create');
    });

    Route::controller(\App\Http\Controllers\InsuranceController::class)->group(function () {
//        Route::get('/customer/{id}/insurance', 'index');
        Route::get('/customer/insurance/create', 'create');
    });


    Route::controller(\App\Http\Controllers\InsuranceClaimController::class)->group(function () {
//        Route::get('/customer/{id}/insurance', 'index');
        Route::get('/customer/insuranceClaim/create', 'create');
    });


    Route::controller(\App\Http\Controllers\LitigationController::class)->group(function () {
//        Route::get('/customer/{id}/litigation', 'index');
        Route::get('/customer/litigation/create', 'create');
    });


    Route::controller(\App\Http\Controllers\InstallmentController::class)->group(function () {
//        Route::get('/customer/{id}/litigation', 'index');
        Route::get('/customer/installment/create', 'create');
    });


});


