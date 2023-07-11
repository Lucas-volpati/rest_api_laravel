<?php

use App\Http\Controllers\Api\PrepareToUse;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Site\SiteController;
use App\Models\User;

/*************************************************************************
* Site Controller
**************************************************************************/
Route::controller(SiteController::class)->group(function() {
    Route::get('/', 'home');
    Route::post('/', 'formulary');
    Route::get('/documentacao', 'documentation');

});

/*************************************************************************
 * Preparing To Use Controller
 **************************************************************************/
Route::controller(PrepareToUse::class)->group(function() {
    Route::get('/preparations', 'runPreparations');
});
