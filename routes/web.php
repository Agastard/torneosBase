<?php

use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneoController::class, 'index'])->name('torneos.torneoslist');
Route::get('/createtorneo',[TorneoController::class, 'create'])->name('torneos.createtorneo');
Route::post('/newtorneo', [TorneoController::class, 'store'])->name('torneos.store');

//Para postman.
Route::get('/token', function () {
  return csrf_token();
});
