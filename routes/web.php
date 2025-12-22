<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController; 

Route::get('/', [FormController::class, 'showForm']);       
Route::post('/', [FormController::class, 'handleSubmit']); 
Route::get('/view2', function(){
    return view('myview2');
});

Route::get('/mycontroller', [App\Http\Controllers\MyController::class, 'INDEX']);
Route::post('/mycontroller', [App\Http\Controllers\MyController::class, 'process']);
Route::get('/test', [App\Http\Controllers\MyController::class, 'index']);

Route::namespace('App\Http\Controllers')->group(function() {
    Route::get('/flight', 'FlightController@index');
});