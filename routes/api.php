<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;

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
Route::post('signup',[AuthController::class , 'SignUp']);
Route::post('signin',[AuthController::class , 'SignIn']);

Route::apiResource('products',ProductController::class)->only(['index','show']);
Route::middleware('auth:sanctum')->group(function () {
    #auth
    Route::get('logout',[AuthController::class , 'LogOut']);
    #end auth

    #cart
    Route::controller(CartController::class)->group(function () {
      Route::get('mycart',"MyCart");
      Route::post('addtocart',"addToCart")->middleware("valide_quantity");
      Route::post('quantityupdate','quantityUpdate')->middleware("valide_quantity");
      Route::delete('deletefromcart/{product}',"deletefromCart");
    });
    #end cart 

    #orders
    Route::controller(OrderController::class)->group(function(){
      Route::get('create/order','createOrder');
      Route::get('myorders','myOrder');
      Route::get('order/details','orderDetails');
    });
    #end of orders
});

