<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;

Route::get('/', [testController::class,'index'])->name('operaciones');
Route::get('/create', [testController::class,'create'])->name('create');
Route::post('/store', [testController::class,'store'])->name('store');
Route::post('/buscador', [testController::class,'buscar'])->name('buscar');
Route::get('/show/{id}', [testController::class,'show'])->name('show');
Route::get('/edit/{id}', [testController::class,'edit'])->name('edit');
Route::put('/update/{id}', [testController::class,'update'])->name('update');
Route::get('/destroy/{id}', [testController::class, 'destroy'])->name('destroy');    

