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

Auth::routes();

Route::post('/vuelogin', 'Auth\LoginController@vuelogin');
Route::get('/committee/events', [App\Http\Controllers\EventController::class, 'index'])->name('events')->middleware('committee');
Route::get('/committee/sponsors', [App\Http\Controllers\Committee\SponsorController::class, 'index'])->name('sponsors')->middleware('committee');

//Route::get('/sponsor/events', [App\Http\Controllers\EventController::class, 'index'])->name('events')->middleware('sponsor');
//Route::get('/sponsor/sponsors', [App\Http\Controllers\Committee\SponsorController::class, 'index'])->name('sponsors')->middleware('sponsor');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sponsor', [App\Http\Controllers\SponsorController::class, 'index'])->name('sponsor')->middleware('sponsor');
Route::get('/committee', [App\Http\Controllers\CommitteeController::class, 'index'])->name('committee')->middleware('committee');
Route::get('/dsa', [App\Http\Controllers\DsaController::class, 'index'])->name('dsa')->middleware('dsa');
