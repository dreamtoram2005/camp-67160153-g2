<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\MyController;

Route::get('/', [PokedexController::class, 'index']); 

Route::post('/welcome', [MyController::class, 'store_index']);
Route::get('/mycontroller', [MyController::class, 'index']);
Route::get('/calculate', [MyController::class, 'info']);
Route::post('/calculate', [MyController::class, 'calculate']);

Route::resource('pokedexs', PokedexController::class);