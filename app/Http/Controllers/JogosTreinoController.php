<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\JogosTreino;
use Illuminate\Support\Facades\DB;

class JogosTreinoController extends Controller
{
    public function index()
    {
        $jogos = DB::table('jogostreino')->select('*')->paginate(7);
        return view('lime.jogostreino', ['jogos' => $jogos]);
    }

    public function create()
    {
        return view('lime.create.jogostreino');
    }

    public function store(Request $request)
    {
        try {
            $this->validate(request(), [
                'name' => 'required',
                'plataforma' => 'required'
            ]);
        } catch (\Exception $e) {
            $response = "Erro ao criar jogo! Preencha o nome e a plataforma";

            return redirect('/create-jogostreino')->with(['error' => $response]);
        }

        try {
            $jogo = new JogosTreino();
            $jogo->name = $request->name;
            $jogo->resultadoBlackPhoenix = $request->resultadoBlackPhoenix;
            $jogo->resultadoDoTime = $request->resultadoDoTime;
            $jogo->linkdademo = $request->linkdademo;
            $jogo->plataforma = $request->plataforma;
            $jogo->save();

            $response = "Criado jogo com sucesso!";

            return redirect('/admin-jogostreino')->with(['response' => $response]);


        } catch (\Exception $e) {
            $response = "Erro ao criar jogo!";

            return redirect('/admin-jogostreino')->with(['response' => $response]);


        }
    }

    public function edit($id)
    {
        $jogo = JogosTreino::find($id);
        return view('lime.edit.jogostreino', [ 'jogo' => $jogo ]);
    }
    public function update(Request $request, $id)
    {
        try {
            $this->validate(request(), [
                'name' => 'required',
                'plataforma' => 'required'
            ]);
        } catch (\Exception $e) {
            $response = "Erro ao criar jogo! Preecha o nome e a plataforma";

            return redirect('/create-jogostreino')->with(['error' => $response]);
        }

        try {
            $jogo = JogosTreino::find($id);
            $jogo->name = $request->name;
            $jogo->resultadoBlackPhoenix = $request->resultadoBlackPhoenix;
            $jogo->resultadoDoTime = $request->resultadoDoTime;
            $jogo->linkdademo = $request->linkdademo;
            $jogo->plataforma = $request->plataforma;
            $jogo->save();

            $response = "Alterado jogo com sucesso!";

            return redirect('/admin-jogostreino')->with(['response' => $response]);


        } catch (\Exception $e) {
            $response = "Erro ao alterar jogo!";

            return redirect('/admin-jogostreino')->with(['response' => $response]);


        }
    }

    public function destroy($id)
    {
        try {
            $jogo = JogosTreino::find($id);
            $jogo->delete();
            $response = "Deletado jogo com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao deletar jogo!";

        }

        return redirect('/admin-jogostreino')->with(['response' => $response]);

    }

}
