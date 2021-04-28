<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\MessageController;
use App\Http\Controllers\backend\reciep;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\backend\ReciepeController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\orderDetailsControlle;
use App\Http\Controllers\backend\HomeController as homeController;
use App\Http\Controllers\backend\ReservationsController;
use App\Mail\ContactResponseMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\frontent\indexController;
use App\Http\Controllers\frontent\RcpController;
use App\Http\Controllers\frontent\Catcontroller;
use App\Http\Controllers\frontent\ContactController;
use App\Http\Controllers\frontent\ReservController;
use App\Http\Controllers\frontent\UsController;

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



Auth::routes() ;
Route::get('dashbord',[homeController::class,'getDashbord'])->name('dashbord');
Route::resource('categories',CategoryController::class);
Route::resource('users',CategoryController::class);
Route::resource('messages',MessageController::class);
Route::resource('receipes',ReciepeController::class);
Route::resource('orders',OrderController::class);
Route::resource('ordersDetails',orderDetailsControlle::class);
Route::get('Print_order/{id}',[orderDetailsControlle::class,'Print_order'])->name('Print_order');

Route::resource('reservations',ReservationsController::class);
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','App\Http\Controllers\RoleController');
Route::resource('users','App\Http\Controllers\UserController');
    });
Route::post('contactResponse/{contact}',[MessageController::class,'response'])->name('contactResponse');
Route::resource('/',indexController::class);
Route::resource('homePage',indexController::class);
    Route::resource('rcps',RcpController::class);
    Route::resource('Cats', CatController::class);
    Route::resource('sign', UsController::class);
    Route::resource('contact',ContactController::class) ;
    Route::get('section/{id}',[RcpController::class,'getRecipes']) ;
    Route::resource('reservation' , ReservController::class) ;
    // ->Middleware("auth") =
Route::get('MarkAsRead_all',[CategoryController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

route::get('section/{id}',[RcpController::class , 'addTOCart'])->name('rcps.addToCart') ;
route::get('section',[RcpController::class , 'getCart'])->name('rcps.shoppingCart') ;
route::get('checkout',[RcpController::class , 'getCheckout'])->name('rcps.checkout') ;
Route::resource('reservations',ReservationsController::class);
