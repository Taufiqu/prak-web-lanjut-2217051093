<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


Route::get('/', function () {
    return view('welcome');    
});
Route::get('/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store',[UserController::class, 'store']) ->name('user.store');
Route::get('/user', [UserController::class, 'index'])->name('user.list');
Route::get('/show/{id}',[UserController::class, 'show'])->name('user.show');
Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::delete('user/{id}',[UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('uploads/{filename}', function ($filename) {
    $path = storage_path('app/uploads/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    return Response::make($file, 200)->header("Content-Type", $type);
});