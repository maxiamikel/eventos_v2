<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\EventoController;


Route::get('/',[EventoController::class,'index' ]);
Route::get('/eventos/create',[EventoController::class,'create']);
Route::get('/eventos/{id}',[EventoController::class,'show']);
Route::get('/reservas/{id}',[EventoController::class,'reservar']);
Route::post('/eventos',[EventoController::class,'store']);
