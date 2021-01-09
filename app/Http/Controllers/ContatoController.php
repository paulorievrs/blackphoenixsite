<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\Exception;

class ContatoController extends Controller
{
    public function store(Request $request)
    {
        try {
            $contato = new Contato();
            $contato->name = $request->name;
            $contato->email = $request->email;
            $contato->mensagem = $request->mensagem;
            $contato->save();
            $response = "Enviado com sucesso!";

        } catch (\Exception $e) {

            $response = "Erro ao enviar mensagem!";

        }
        return redirect('/contato')->with(['response' => $response]);


    }
}
