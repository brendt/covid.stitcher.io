<?php

use App\Http\Controllers\CurveController;
use App\Http\Controllers\MetaImageController;
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

Route::get('/{country?}', CurveController::class);
Route::get('/image/{country?}', MetaImageController::class);
