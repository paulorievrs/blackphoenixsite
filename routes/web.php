<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwitchController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CampeonatosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
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




 /////////////////////////////
Route::get('/', [ JogoController::class, 'getRecents' ]);

Route::get('/jogos', [ JogoController::class, 'index_jogos' ]);

Route::get('/streamers', [ TwitchController::class, 'getData']);

Route::get('/contato', function () {
    return view('contato');
});

//Route::get('/enviar-email', function () {
//    Mail::send(new \App\Mail\newContato());
//});


Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [ JogoController::class, 'limeindex']);
    Route::get('/profile', function () {
        return view('lime.profile');
    });

    Route::get('/edit-profile', [ UserController::class, 'edit' ]);
    Route::put('/profile', [ UserController::class, 'update' ]);
    Route::put('/edit-profileimagelink', [ UserController::class, 'updateProfileImageLink' ]);
    Route::put('/edit-password', [ UserController::class, 'updatePassword' ]);

    Route::get('/admin-campeonatos', [ CampeonatosController::class, 'index']);
    Route::get('/create-campeonato', [ CampeonatosController::class, 'create']);
    Route::post('/campeonato', [ CampeonatosController::class, 'store']);
    Route::put('/campeonato/{id}', [ CampeonatosController::class, 'update']);
    Route::get('/edit-campeonato/{id}', [ CampeonatosController::class, 'edit']);
    Route::delete('/delete-campeonato/{id}', [ CampeonatosController::class, 'destroy']);

    Route::post('/link', [ LinkController::class, 'store' ]);
    Route::delete('/delete-link/{id}', [ LinkController::class, 'destroy' ]);

    Route::get('/admin-jogos', [ JogoController::class, 'index']);
    Route::get('/create-jogo', [ JogoController::class, 'create']);
    Route::post('/jogo', [ JogoController::class, 'store' ]);
    Route::put('/jogo/{id}', [ JogoController::class, 'update' ]);
    Route::get('/edit-jogo/{id}', [ JogoController::class, 'edit' ]);
    Route::delete('/delete-jogo/{id}', [ JogoController::class, 'destroy' ]);

    Route::get('/create-time', [ TimeController::class, 'create']);
    Route::get('/admin-times', [ TimeController::class, 'index']);
    Route::post('/time', [ TimeController::class, 'store']);
    Route::put('/time/{id}', [ TimeController::class, 'update']);
    Route::get('/edit-time/{id}', [ TimeController::class, 'edit']);
    Route::delete('/delete-time/{id}', [ TimeController::class, 'destroy']);

});
Route::get('/profile/{twitch_username}', [ UserController::class, 'profile' ]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
