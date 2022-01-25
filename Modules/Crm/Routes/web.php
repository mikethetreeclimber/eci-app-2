<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Crm\Http\Controllers\CircuitController;
use Modules\Crm\Http\Controllers\CrmController;
use Modules\Crm\Http\Controllers\StationsController;

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
    Route::middleware('auth')
        ->prefix('/crm')->as('crm.')
            ->group(function () {
                Route::get('', [CrmController::class, 'index']);
                Route::prefix('/circuit/{circuit:circuit_name}')->as('circuit.')->group(function () {
                    Route::get('/', [CircuitController::class, 'show'])->name('show');

                    Route::get('/station/{station}', [StationsController::class, 'show'])
                        ->name('station.show');
                });
    });
