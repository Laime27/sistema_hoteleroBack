<?php

use App\Http\Controllers\categoria\categoriaController;
use App\Http\Controllers\nivel\nivelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::resource('categoria', categoriaController::class);
Route::resource('nivel', nivelController::class);






