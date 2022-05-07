<?php

use App\Http\Controllers\ForecastController;
use Illuminate\Support\Facades\Route;

Route::get('forcast', [ForecastController::class, 'get'])->name('app');
