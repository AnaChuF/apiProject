<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('refresh', 'refresh');
    Route::post('logout', 'logout');
    Route::post('me', 'me');
    
});


Route::middleware('auth:api')->group(function(){
    Route::controller(ProductController::class)->group(function(){
        Route::get('/list',[ProductController::class,'list']);
        Route::post('/create',[ProductController::class,'store']);
        Route::post('/update',[ProductController::class,'update']);
        Route::post('/delete',[ProductController::class,'delete']);
    });
});
    
