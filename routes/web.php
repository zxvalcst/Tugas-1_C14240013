<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [FasilitasController::class, 'home'])->name('home');
Route::get('/facility', [FasilitasController::class, 'facility'])->name('facility');

