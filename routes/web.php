<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/edit/{siswa}', [SiswaController::class, 'edit']);
Route::put('/siswa/edit/{siswa}', [SiswaController::class, 'update']);
Route::post('/siswa', [SiswaController::class, 'store']);
