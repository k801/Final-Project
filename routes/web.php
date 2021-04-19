<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\reciep;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\backend\ReciepeController;
use App\Http\Controllers\backend\ReservationsController;
use App\Http\Controllers\frontent\indexController;
use App\Mail\ContactResponseMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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

Route::resource('homePage',indexController::class);



Auth::routes();
Route::resource('categories',CategoryController::class);
Route::resource('users',CategoryController::class);
Route::resource('messages',MessageController::class);
Route::resource('reciepes',ReciepeController::class);
Route::resource('reservations',ReservationsController::class);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::resource('users','App\Http\Controllers\UserController');
    });

    Route::post('contactResponse/{contact}',[MessageController::class,'response'])->name('contactResponse');

