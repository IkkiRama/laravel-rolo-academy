<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;



// login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);





// Siswa & Dashboard
Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', function () {
        return view('siswa.home');
    });

    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/edit/{siswa}', [SiswaController::class, 'edit']);
    Route::put('/siswa/edit/{siswa}', [SiswaController::class, 'update']);
    Route::post('/siswa', [SiswaController::class, 'store']);
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);

});
