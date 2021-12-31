<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JeloController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/jela', [JeloController::class, 'index'])->name('index');
Route::get('/getjela', [JeloController::class, 'getJela'])->name('getJela');
Route::get('/getparams', [JeloController::class, 'getParams'])->name('getParams');
Route::get('/getjelafiltered', [JeloController::class, 'getJelaFiltered'])->name('getJelaFiltered');

//Route::resource('/jela', [JeloController::class, 'index'])->name('index');