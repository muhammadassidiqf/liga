<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\PertandinganController;

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

Route::group(['prefix' => ''], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

// Route::group(['prefix' => 'users'], function () {
//     Route::get('/', 'UsersController@index')->name('users.index');
//     Route::get('/create', 'UsersController@create')->name('users.create');
//     Route::post('/store', 'UsersController@store')->name('users.store');
//     Route::get('/edit/{id}', 'UsersController@edit')->name('users.edit');
//     Route::put('/update', 'UsersController@update')->name('users.update');
//     Route::put('/password', 'UsersController@password')->name('users.password');
//     Route::get('/delete/{id}', 'UsersController@delete')->name('users.delete');
// });
Route::controller(KlubController::class)->prefix('klub')->group(function () {
    Route::get('/', 'index')->name('klub.index');
    Route::post('/store', 'store')->name('klub.store');
    Route::get('/edit/{id}', 'edit')->name('klub.edit');
    Route::post('/update/{id}', 'update')->name('klub.update');
    Route::post('/delete/{id}', 'delete')->name('klub.delete');
});
Route::controller(PertandinganController::class)->prefix('pertandingan')->group(function () {
    Route::get('/', 'index')->name('pertandingan.index');
    Route::post('/store', 'store')->name('pertandingan.store');
});
