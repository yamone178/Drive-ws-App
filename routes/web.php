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
    return redirect()->route('myDrive.index');
});

Route::get('/home', function () {
    return redirect()->route('myDrive.index');
});

Auth::routes();


Route::middleware(['auth'])->prefix('drive')->group(function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('myDrive',\App\Http\Controllers\DriveController::class);
    Route::resource('folder',\App\Http\Controllers\FolderController::class);
    Route::resource('file',\App\Http\Controllers\FileController::class);
    Route::get('/file/download/{id}',[\App\Http\Controllers\FileController::class,'download'])->name('file.download');
    Route::get('/folder/download/{id}',[\App\Http\Controllers\FolderController::class,'download'])->name('folder.download');
});
