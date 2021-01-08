<?php

namespace App\Http\Controllers;

use App\Models\Campeonatos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampeonatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $campeonatos = DB::table('campeonatos')->select('*')->orderBy('id', 'desc')->paginate(10);

        return view('lime.campeonatos', ['campeonatos' => $campeonatos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('lime.create.campeonato');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $campeonato = new Campeonatos();
            $campeonato->name = $request->name;
            $campeonato->save();
            $response = "Campeonato criado com sucesso!";
            redirect('/admin-campeonatos')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao criar campeonato!";
            redirect('/create-campeonato')->with(['response' => $response]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        $campeonato = Campeonatos::find($id);
        return view('lime.edit.campeonato', ['campeonato' => $campeonato]);

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
        $campeonato = Campeonatos::find($id);
        try {
            $campeonato->name = $request->name;
            $campeonato->save();
            $response = "Alterado com sucesso: " . $campeonato->name;
            return redirect('/admin-campeonatos')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao alterar: " . $campeonato->name;
            return redirect('/edit-campeonatos')->with(['response' => $response]);
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
        $campeonato = Campeonatos::find($id);
        try {
            $campeonato->delete();
            $response = "Deletado com sucesso: " . $campeonato->name;
            return redirect('/admin-campeonatos')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao deletar: " . $campeonato->name;
            return redirect('/admin-campeonatos')->with(['response' => $response]);
        }

    }

}
