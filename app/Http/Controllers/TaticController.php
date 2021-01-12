<?php

namespace App\Http\Controllers;

use App\Models\Tatic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $tatics = DB::table('tatics')->select('*')->orderByDesc('id')->paginate(7);

        return view('lime.tatics', [ 'tatics' => $tatics ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return view('lime.create.tatics');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            $tatic = new Tatic();
            $tatic->name = $request->name;
            $tatic->description = $request->description;
            $tatic->save();
            $response = "Criado tática com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao criar tática!";

        }

        return redirect('/admin-tatics')->with(['response' => $response]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $tatic = Tatic::find($id);
        $tatic->taticimage;

        return view('lime.complete-tatic', [ 'tatic' => $tatic ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tatic = Tatic::find($id);
        return view('lime.edit.tatics', ['tatic' => $tatic]);
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
        try {
            $tatic = Tatic::find($id);
            $tatic->name = $request->name;
            $tatic->description = $request->description;
            $tatic->save();
            $response = "Alterado tática com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao alterar tática!";

        }

        return redirect('/admin-tatics')->with(['response' => $response]);
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
            $tatic = Tatic::find($id);
            $tatic->delete();
            $response = "Deletado tática com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao deletar tática!";
        }

        return redirect('/admin-tatics')->with(['response' => $response]);
    }
}
