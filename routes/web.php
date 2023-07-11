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
 * API Controller
 **************************************************************************/
// Route::controller(ApiController::class)->group(function() {
//     Route::get('/all_books/{limit?}', 'getAllBooks');
//     Route::get('/book/{id}', 'getBookById');
//     Route::get('/get_users/', 'getUsers');
// });

/*************************************************************************
 * Preparing To Use Controller
 **************************************************************************/
Route::controller(PrepareToUse::class)->group(function() {
    Route::get('/preparations', 'runPreparations');
});
