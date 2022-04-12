<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SelectsController;
use App\Http\Controllers\CalculatesController;

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

Route::get('/', [SelectsController::class, 'index'])->name('select.index');
Route::post('/calculate', [CalculatesController::class, 'calculate'])->name('calculate.index');
