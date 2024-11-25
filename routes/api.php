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

Route::controller(AuthController::class)->group(function () {
    Route::post('signup', 'SignUp');
    Route::post('signin', 'SignIn');
});


Route::apiResource('products',ProductController::class)->only(['index','show']);


Route::middleware('auth:sanctum')->group(function () {
    #auth
    Route::get('logout',[AuthController::class , 'LogOut']);
    #end auth

    #cart
    Route::controller(CartController::class)->group(function () {
      Route::get('mycart',"MyCart");
      Route::post('addtocart',"addToCart")->middleware("valide_quantity");
      //Route::post('quantityupdate/','quantityUpdate')->middleware("valide_quantity");
      Route::patch('quantityupdate/{product}','quantityUpdate');
      Route::delete('deletefromcart/{product}',"deletefromCart");
    });
    #end cart

    #orders
    Route::prefix('orders')->controller(OrderController::class)->group(function(){
      Route::get('create','store');
      Route::get('myorders','index');
      Route::get("show/{order}",'show');
    });
    #end of orders
});

