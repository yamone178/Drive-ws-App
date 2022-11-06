<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\FolderApiController;
use App\Http\Controllers\FileApiController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('responseToJson')->prefix('v1/drive')->group(function (){
    //auth
    Route::post('/register',[AuthApiController::class,'register'])->name('api-auth.register');
    Route::post('/login',[AuthApiController::class,'login'])->name('api-auth.login');

    Route::middleware('auth:sanctum')->group(function (){

        Route::post('logout',[AuthApiController::class,'logout'])->name('api-auth.logout');
        Route::post("/logout-all",[AuthApiController::class,'logoutAll'])->name('api.logout-all');

        Route::apiResource('folder',FolderApiController::class);
        Route::apiResource('file', FileApiController::class);



    });
});
