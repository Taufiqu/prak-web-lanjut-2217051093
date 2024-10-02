<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');    
});
Route::get('/user/profile', [UserController::class, 'profile']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/store',[UserController::class, 'store']) ->name('user.store');   