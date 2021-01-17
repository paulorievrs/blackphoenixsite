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
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JogosTreinoController;
use App\Http\Controllers\TaticController;
use App\Http\Controllers\TaticImageController;
use App\Http\Controllers\AmazonController;
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
//Route::get('/', [ JogoController::class, 'getRecents' ]);
//
//Route::get('/jogos', [ JogoController::class, 'index_jogos' ]);
//
//Route::get('/streamers', [ TwitchController::class, 'getData']);

Route::get('/', [ IndexController::class, 'homepage' ]);

Route::get('/streams', [ TwitchController::class, 'getData']);

Route::get('/jogos', [ JogoController::class, 'listJogos']);

Route::get('/news', [ NewsController::class, 'index']);

Route::get('news/{id}', [ NewsController::class, 'show'] );

Route::get('/contato', function() {
   return view('front.contato');
});
Route::post('/contato-send', [ \App\Http\Controllers\ContatoController::class, 'store']);



//Route::get('/contato', function () {
//    return view('contato');
//});

Route::get('/profile/{twitch_username}', [ UserController::class, 'profile' ]);


//Route::get('/enviar-email', function () {
//    Mail::send(new \App\Mail\newContato());
//});

Route::get('/amazon', [AmazonController::class, 'index']);

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


    Route::get('/admin-jogostreino', [ JogosTreinoController::class, 'index']);
    Route::get('/create-jogostreino', [ JogosTreinoController::class, 'create']);
    Route::post('/jogostreino', [ JogosTreinoController::class, 'store']);
    Route::put('/jogostreino/{id}', [ JogosTreinoController::class, 'update']);
    Route::get('/edit-jogostreino/{id}', [ JogosTreinoController::class, 'edit']);
    Route::delete('/delete-jogostreino/{id}', [ JogosTreinoController::class, 'destroy']);

    Route::get('/admin-tatics', [ TaticController::class, 'index']);
    Route::get('/create-tatics', [ TaticController::class, 'create']);
    Route::post('/tatic', [ TaticController::class, 'store']);
    Route::put('/tatic/{id}', [ TaticController::class, 'update']);
    Route::get('/edit-tatic/{id}', [ TaticController::class, 'edit']);
    Route::delete('/delete-tatic/{id}', [ TaticController::class, 'destroy']);
    Route::get('/complete-tatic/{id}', [ TaticController::class, 'show']);

    Route::get('/admin-taticimage', [ TaticImageController::class, 'index']);
    Route::get('/create-taticimage', [ TaticImageController::class, 'create']);
    Route::post('/taticimage', [ TaticImageController::class, 'store']);
    Route::put('/taticimage/{id}', [ TaticImageController::class, 'update']);
    Route::get('/edit-taticimage/{id}', [ TaticImageController::class, 'edit']);
    Route::delete('/delete-taticimage/{id}', [ TaticImageController::class, 'destroy']);

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

    Route::get('/create-news', [ NewsController::class, 'create']);
    Route::get('/edit-news/{id}', [ NewsController::class, 'edit']);
    Route::put('/news/{id}', [ NewsController::class, 'update']);
    Route::post('/news', [ NewsController::class, 'store']);
    Route::get('admin-news', [ NewsController::class, 'listNews' ]);

    Route::get('/create-amazon', [ AmazonController::class, 'create' ]);
    Route::post('/amazon', [ AmazonController::class, 'store' ]);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
