<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::group(['prefix' => 'events'], function () {
//    Route::get('/', [App\Http\Controllers\EventController::class, 'index']);
//    Route::post('add', [App\Http\Controllers\EventController::class, 'add']);
//    Route::get('edit/{id}', [App\Http\Controllers\EventController::class, 'edit']);
//    Route::post('update/{id}', [App\Http\Controllers\EventController::class, 'update']);
//    Route::delete('delete/{id}', [App\Http\Controllers\EventController::class, 'delete']);
//});

//Route::get('events', [App\Http\Controllers\EventController::class, 'allEvents']);
//Route::post('events/add', [App\Http\Controllers\EventController::class, 'store']);
//Route::get('events/edit/{id}', [App\Http\Controllers\EventController::class, 'edit']);
//Route::patch('events/update/{id}', [App\Http\Controllers\EventController::class, 'update']);
//Route::delete('events/delete/{id}', [App\Http\Controllers\EventController::class, 'destroy']);


//Route::resource('events', [App\Http\Controllers\EventController::class]);
Route::group(['prefix' => 'events'], function () {
    Route::get('/', [App\Http\Controllers\EventController::class, 'allEvents']);
    Route::post('add', [App\Http\Controllers\EventController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\EventController::class, 'edit']);
    Route::get('edit/{id}', [App\Http\Controllers\EventController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\EventController::class, 'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\EventController::class, 'destroy']);
});

//Route::group(['prefix' => 'sponsors', 'middleware' => ['auth']], function () {
//    Route::get('/', [App\Http\Controllers\Committee\SponsorController::class, 'allSponsors']);
//    Route::post('add', [App\Http\Controllers\SponsorController::class, 'store']);
//    Route::get('/{id}', [App\Http\Controllers\SponsorController::class, 'edit']);
//    Route::get('edit/{id}', [App\Http\Controllers\SponsorController::class, 'edit']);
//    Route::post('update/{id}', [App\Http\Controllers\SponsorController::class, 'update']);
//    Route::delete('delete/{id}', [App\Http\Controllers\SponsorController::class, 'destroy']);
//});
Route::group(['prefix' => 'sponsors'], function () {
    Route::get('/', [App\Http\Controllers\Committee\SponsorController::class, 'allSponsors']);
    Route::post('add', [App\Http\Controllers\SponsorController::class, 'store']);
    Route::get('/{id}', [App\Http\Controllers\SponsorController::class, 'edit']);
    Route::get('edit/{id}', [App\Http\Controllers\SponsorController::class, 'edit']);
    Route::post('update/{id}', [App\Http\Controllers\SponsorController::class, 'update']);
    Route::delete('delete/{id}', [App\Http\Controllers\SponsorController::class, 'destroy']);
});
