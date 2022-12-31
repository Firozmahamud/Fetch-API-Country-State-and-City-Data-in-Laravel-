<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BdController;
use App\Http\Controllers\UniverseController;
use App\Http\Controllers\FilterController;


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


// Route::get('/filter', function () {
//     if (request()->start_date || request()->end_date) {
//         $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
//         $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
//         $data = App\Models\Registrant::whereBetween('created_at',[$start_date,$end_date])->get();
//     } else {
//         $data = App\Models\Registrant::latest()->get();
//     }

//     return view('filter.index', compact('data'));
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/filter',[FilterController::class,'index']);
Route::get('/filter3',[FilterController::class,'cal']);
Route::get('/countries',[UniverseController::class,'index']);
Route::get('/states',[UniverseController::class,'getStates'])->name('states');
Route::get('/cities',[UniverseController::class,'getCities'])->name('cities');

Route::get('/bd',[BdController::class,'index']);
Route::post('/bd/store',[BdController::class, 'store'])->name('bd.store');
Route::get('/bdcities',[BdController::class,'bdcities'])->name('bdcities');


// Route::get('/country', function () {
//     return view('bd.form');
// });
