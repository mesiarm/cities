<?php

use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/city/{city}', [CitiesController::class, 'showCity'])->name('showCity');
Route::get('/', function () {
    return view('homepage');
});
