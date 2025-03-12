<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->middleware('jwt.auth')->name('api.logout');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth')->name('api.refresh');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
