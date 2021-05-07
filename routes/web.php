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
use App\Http\Controllers\backend\paymentProviderController;
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
use App\Http\Controllers\frontent\Ratecontroller;

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
Route::resource('reservation',ReservationsController::class);
Route::group(['middleware' => ['auth']], function() {
Route::resource('roles','App\Http\Controllers\RoleController');
Route::resource('users','App\Http\Controllers\UserController');
    });
Route::post('contactResponse/{contact}',[MessageController::class,'response'])->name('contactResponse');
Route::resource('/',indexController::class);
Route::resource('homePage',indexController::class);
    Route::resource('reciepes',RcpController::class);
    Route::resource('Categorys', CatController::class);
    Route::resource('sign', UsController::class);
    Route::resource('contact',ContactController::class);
    Route::get('section/{id}',[RcpController::class,'getRecipes']) ;

    // ->Middleware("auth") =

  Route::get('MarkAsRead_all',[CategoryController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
  route::get('rcps.addToCart/{id}',[RcpController::class , 'addTOCart']);

  route::get('checkout',[RcpController::class , 'getCheckout'])->name('reciepes.checkout') ;

  Route::get('test',function(){
    return view('front.stars.rating');
});

// payment Rout

Route::get('get-checkout-id',[paymentProviderController::class,'getChechOutId'])->name("offers-checkout");
Route::get('get-stars',[RcpController::class,'getStars'])->name("stars-checkout");
    
Route::resource('reservation' , ReservController::class)->middleware("auth") ;
Route::resource('reservations',ReservationsController::class);
Route::get('MarkAsRead_all',[CategoryController::class,'MarkAsRead_all'])->name('MarkAsRead_all');

//cart
route::get('cart/{id}',[RcpController::class , 'addTOCart'])->name('receipes.addToCart')->Middleware("auth") ; 
route::get('cart',[RcpController::class , 'getCart'])->name('receipes.shoppingCart')->Middleware("auth") ; 
route::get('checkout',[RcpController::class , 'getCheckout'])->name('receipes.checkout') ;
Route::get('offers_pgae',[RcpController::class,'offers']) ;

route::get('cash',[RcpController::class , 'getCash'])->name('receipes.cash') ;
route::get('reduce/{id}',[RcpController::class , 'getReduceByOne'])->name('receipes.reduceByOne') ;
route::get('remove/{id}',[RcpController::class , 'getRemoveItem'])->name('receipes.RemoveAll') ;


// rating
// Route::get('rating',[paymentProviderController::class,'getRating'])->name("rating-sars");
Route::get('login-user', function ()
{
    return view('front.login') ;

});





// get the rate value
Route::get('get_rate_valu',[RcpController::class,'get_rate'])->name("store-stars");
// get all recipes by Ajax
Route::get('getRecipes/{id}',[RcpController::class,'get_recipes']);
// get details
Route::get('getRecipesDetails/{id}',[RcpController::class,'getRecipesDetails']);