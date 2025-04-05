<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudanteController;
use App\Http\Controllers\TurmaController;

Route::get('/', function () {
    return view('welcome');
})->name('home'); 

Route::resource('estudantes', EstudanteController::class);
Route::resource('turmas', TurmaController::class);
