<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniverseController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/countries',[UniverseController::class,'index']);
Route::get('/states',[UniverseController::class,'getStates'])->name('states');
Route::get('/cities',[UniverseController::class,'getCities'])->name('cities');
