<?php

use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TorneoController::class, 'index'])->name('torneos.torneoslist');
