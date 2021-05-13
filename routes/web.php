<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AuthController;



// login
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);





// Siswa & Dashboard
Route::group(['middleware' => ['auth', 'CekRole:admin']], function(){
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/guru', [GuruController::class, 'index']);

    Route::get('/siswa/edit/{siswa}', [SiswaController::class, 'edit']);
    Route::put('/siswa/edit/{siswa}', [SiswaController::class, 'update']);


    Route::get('/siswa/profil/{siswa}', [SiswaController::class, 'profil']);
    Route::post('/siswa/addnilai/{siswa}', [SiswaController::class, 'add_nilai']);
    Route::delete('/siswa/{siswa}/hapusnilai/{mapel}', [SiswaController::class, 'hapus_nilai']);


    Route::post('/siswa', [SiswaController::class, 'store']);
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);




    // guru
    Route::get('/guru/profil/{guru}', [GuruController::class, 'profil']);


});
Route::group(['middleware' => ['auth', 'CekRole:admin,siswa']], function(){

    Route::get('/dashboard', [SiswaController::class, 'dashboard']);

});
