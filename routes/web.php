<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController; 

Route::get('/', [FormController::class, 'showForm']);
Route::post('/', [FormController::class, 'handleSubmit']); 
Route::get('/view2', function(){
    return view('myview2');
});