<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = DB::table('jogos')->select('*')->orderBy('diaDoJogo', 'desc')->paginate(8);

        return view('jogos')->with(['jogos' => $jogos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createjogo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate(request(), [
                'nomeDoTime' => 'required',
                'diaDoJogo' => 'required',
                'horaDoJogo' => 'required'
            ]);
        } catch (\Exception $e) {
            $response = "Erro ao criar jogo! Preencha Nome, dia e hora";

            return redirect('/admin/createjogos')->with(['response' => $response]);
        }

        try {
            $jogo = new Jogo();
            $jogo->nomeDoTime = $request->nomeDoTime;
            $jogo->diaDoJogo = $request->diaDoJogo;
            $jogo->horaDoJogo = $request->horaDoJogo;
            $jogo->linkParaAssistir = $request->linkParaAssistir;
            $jogo->logoDoTime = $request->logoDoTime;
            $jogo->resultadoBlackPhoenix = $request->resultadoBlackPhoenix;
            $jogo->resultadoDoTime = $request->resultadoDoTime;
            $jogo->campeonato = $request->campeonato;
            $jogo->save();

            $response = "Criado jogo com sucesso!";

            return redirect('/admin/jogos')->with(['response' => $response]);

        } catch (\Exception $e) {
            $response = "Erro ao criar jogo!";

            return redirect('/admin/jogos')->with(['response' => $response]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogo = Jogo::find($id);
        return view('admin.editjogo')->with(['jogo' => $jogo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'nomeDoTime' => 'required',
            'diaDoJogo' => 'required',
            'horaDoJogo' => 'required'
        ]);

        try {
            $jogo = Jogo::find($id);
            $jogo->nomeDoTime = $request->nomeDoTime;
            $jogo->diaDoJogo = $request->diaDoJogo;
            $jogo->horaDoJogo = $request->horaDoJogo;
            $jogo->linkParaAssistir = $request->linkParaAssistir;
            $jogo->logoDoTime = $request->logoDoTime;
            $jogo->resultadoBlackPhoenix = $request->resultadoBlackPhoenix;
            $jogo->resultadoDoTime = $request->resultadoDoTime;
            $jogo->campeonato = $request->campeonato;
            $jogo->save();

            $response = "Editado com sucesso";
            return redirect('/admin/jogos')->with(['response' => $response]);

        } catch (\Exception $e) {
            $response = "Erro ao editar";
            return redirect('/admin/jogos')->with(['response' => $response]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $jogo = Jogo::find($id);
            $jogo->delete();

            $response = "Deletado com sucesso.";

            return redirect('admin/jogos')->with(['response' => $response]);

        } catch (\Exception $e) {
            $response = "Erro ao deletar.";

            return redirect('admin/jogos')->with(['response' => $response]);
        }
    }

    public function getRecents()
    {
        $today = (date('Y-m-d'));
        $jogos = DB::table('jogos')->select('*')->where('diaDoJogo', '>=', $today)->orderBy('diaDoJogo', 'desc')->paginate(5);


        return view('index')->with(['jogos' => $jogos]);
    }

    public function createTable()
    {
        $jogos = DB::table('jogos')->select('*')->orderBy('diaDoJogo', 'desc')->paginate(8);
        return view('admin.jogos')->with(['jogos' => $jogos]);
    }
}
