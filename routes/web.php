<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');    
});
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store',[UserController::class, 'store']) ->name('user.store');
Route::get('/user', [UserController::class, 'index']);
Route::get('/show/{id}',[UserController::class, 'show'])->name('user.show');