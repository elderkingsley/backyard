<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CentralController;


Route::get('/', function () {
    return view('welcome');
});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function() {
Route::get('/register', 'showRegister')->name('show.register');
Route::get('/login', 'showLogin')->name('show.login');
Route::post('/register', 'register')->name('register');
Route::post('/login', 'login')->name('login');
});


Route::middleware('auth')->group(function (){
Route::get('/central', [CentralController::class, 'centralIndex'])->name('central.index')->middleware('auth');
Route::resource('customer', CustomerController::class);
});

