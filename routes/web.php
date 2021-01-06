<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitchController;
use App\Http\Controllers\JogoController;
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

Route::get('/', [ JogoController::class, 'getRecents' ]);
Route::get('/jogos', [ JogoController::class, 'index' ]);

Route::get('/streamers', [ TwitchController::class, 'getData']);
