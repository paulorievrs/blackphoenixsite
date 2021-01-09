<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function homepage()
    {
        $today = (date('Y-m-d'));
        $jogos = DB::table('jogos')->select('*')->where('diaDoJogo', '>=', $today)->orderBy('diaDoJogo', 'desc')->paginate(5);

        $users = DB::table('users')->select('*')->inRandomOrder()->get();
        return view('front.index', [
            'users' => $users,
            'jogos' => $jogos
        ]);

    }
}
