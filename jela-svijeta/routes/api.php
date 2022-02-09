<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;

//a route i created for myself to test soft deletes
//Route::get('/meals/softdelete', [MealController::class, 'softdelete'])->name('softdelete');

//a route for fetching the data
// /api/meals?parameters
Route::get('/meals', [MealController::class, 'meals'])->name('meals'); //jedina ruta koja nam treba