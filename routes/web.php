<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\EventoController;


Route::get('/',[EventoController::class,'index' ]);
Route::get('/eventos/create',[EventoController::class,'create']);
Route::get('/eventos/{id}',[EventoController::class,'show']);
Route::get('/reservas/{id}',[EventoController::class,'reservar']);
Route::post('/eventos',[EventoController::class,'store']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
