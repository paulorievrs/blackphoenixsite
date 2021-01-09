<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TwitchController extends Controller
{
    public function getData()
    {
        $twitch_names = ['joyume', 'dienicic', 'acypreste', 'juliaferrante'];
//            $twitch_names = ['deercheerup', 'gaules', 'liminhag0d', 'pokemaobr'];
        shuffle($twitch_names);

        $user_login = "";
        foreach($twitch_names as $name)
        {
            $user_login = $user_login . "user_login=" . $name . "&";
        }

        $response = Http::withHeaders([
            'client-id' => 'gp762nuuoqcoxypju8c569th9wz7q5',
            'Authorization' => 'Bearer cl2p8lx2y758g3vat3t6wsqzs7qmcy'
        ])->get('https://api.twitch.tv/helix/streams?' . $user_login);

        $response = json_decode($response->body());

        shuffle($response->data);
        return view('front.videos')->with([
            'response' => $response,
            'twitch_names' => $twitch_names
        ]);
    }
}
