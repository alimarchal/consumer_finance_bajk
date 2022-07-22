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
    return to_route('login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\CustomerController::class,'dashboard'])->name('dashboard');


//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
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
        Route::get('/customer', 'index')->name('customer.index');
        Route::put('/customer/{customer}', 'update')->name('customer.update');
        Route::get('/customer/{customer}', 'show')->name('customer.show');
        Route::get('/customer/{customer}/profile', 'profile')->name('customer.profile');
    });

    Route::controller(\App\Http\Controllers\GuaranteeController::class)->group(function () {
        Route::get('/customer/{customer}/guarantee', 'index')->name('guarantee.index');
        Route::post('/guarantee/{customer}', 'store')->name('guarantee.store');
    });

    Route::controller(\App\Http\Controllers\OtherGuaranteeController::class)->group(function () {
        Route::get('/customer/{customer}/otherGuarantee', 'index')->name('otherGuarantee.index');
        Route::post('/otherGuarantee/{customer}', 'store')->name('otherGuarantee.store');
    });

    Route::controller(\App\Http\Controllers\InsuranceController::class)->group(function () {
        Route::get('/customer/{customer}/insurance', 'index')->name('insurance.index');
        Route::post('/insurance/{customer}', 'store')->name('insurance.store');
    });

    Route::controller(\App\Http\Controllers\InsuranceClaimController::class)->group(function () {
        Route::get('/customer/{customer}/insuranceClaim', 'index')->name('insuranceClaim.index');
        Route::post('/insuranceClaim/{customer}', 'store')->name('insuranceClaim.store');
    });

    Route::controller(\App\Http\Controllers\LitigationController::class)->group(function () {
        Route::get('/customer/{customer}/litigation', 'index')->name('litigation.index');
        Route::post('/litigation/{customer}', 'store')->name('litigation.store');
    });

    Route::controller(\App\Http\Controllers\ValuationController::class)->group(function () {
        Route::get('/customer/{customer}/valuation', 'index')->name('valuation.index');
        Route::post('/valuation/{customer}', 'store')->name('valuation.store');
    });

    Route::controller(\App\Http\Controllers\InstallmentController::class)->group(function () {
        Route::get('/customer/{customer}/installment', 'index')->name('installment.index');
        Route::post('/installment/{customer}', 'store')->name('installment.store');
    });

    Route::controller(\App\Http\Controllers\MarkUpDetailsController::class)->group(function () {
        Route::get('/customer/{customer}/markUpDetails', 'index')->name('markUpDetails.index');
        Route::post('/markUpDetails/{customer}', 'store')->name('markUpDetails.store');
    });

    Route::controller(\App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::put('/users/{user}', 'update')->name('users.update');
    });



    Route::controller(\App\Http\Controllers\ReportController::class)->group(function () {
        Route::get('/report/branch-wise-position', 'branchWisePosition')->name('report.branch-wise-position');
    });




});


