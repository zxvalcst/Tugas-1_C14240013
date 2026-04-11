<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FasilitasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [FasilitasController::class, 'home'])->name('home');
Route::get('/facility', [FasilitasController::class, 'facility'])->name('facility');
Route::get('/facility/create', [FasilitasController::class, 'create'])->name('facility.create');
Route::post('/facility', [FasilitasController::class, 'store'])->name('facility.store');
Route::get('/facility/{id}', [FasilitasController::class, 'edit'])->name('facility.edit');
Route::put('/facility/{id}', [FasilitasController::class, 'update'])->name('facility.update');
Route::delete('/facility/{id}', [FasilitasController::class, 'delete'])->name('facility.delete');