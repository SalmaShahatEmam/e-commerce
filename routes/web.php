<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\OrderController;

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
Broadcast::channel('orders', function ($user) {
    return $user;  
});


Route::prefix('admin')->group(function () {

    Route::get('login',[AuthController::class , 'showLoginForm'])->name('admin.login');
    Route::post('login',[AuthController::class , 'login'])->name('admin.login.post');


    Route::resource('orders' , OrderController::class)->only(['index','show'])->middleware("auth");
});
