<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitchController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Mail;
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

Route::get('/contato', function () {
    return view('contato');
});

//Route::get('/enviar-email', function () {
//    Mail::send(new \App\Mail\newContato());
//});


Route::group(['middleware' => ['auth']], function() {

    Route::get('/admin', function () {
        return view('admin.index');
    });

    Route::post('/jogos', [ JogoController::class, 'store' ]);

    Route::get('/editjogo/{id}', [ JogoController::class, 'edit' ]);

    Route::put('/jogos/{id}', [ JogoController::class, 'update' ]);

    Route::delete('/jogos/{id}', [ JogoController::class, 'destroy' ]);

    Route::get('/admin/jogos', [ JogoController::class, 'createTable' ]);

    Route::get('/admin/createjogos', [ JogoController::class, 'create']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
