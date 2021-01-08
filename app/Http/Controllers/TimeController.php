<?php

namespace App\Http\Controllers;

//use App\Models\Time;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = DB::table('times')->select('*')->orderBy('id', 'desc')->paginate(10);

        return view('lime.times', ['times' => $times]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('lime.create.time');
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
            $time = new Time();
            $time->teamName = $request->teamName;
            $time->teamLogo = $request->teamLogo;
            $time->save();
            $response = "Time criado com sucesso.";
            return redirect('/admin-times')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao criar time.";
            return redirect('/admin-times')->with(['response' => $response]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $time = Time::find($id);
        return view('lime.edit.time', ['time' => $time]);
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
            $time = Time::find($id);
            $time->teamName = $request->teamName;
            $time->teamLogo = $request->teamLogo;
            $time->save();
            $response = "Time alterado com sucesso.";
            return redirect('/admin-times')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao alterar time.";
            return redirect('/admin-times')->with(['response' => $response]);
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
            $time = Time::find($id);
            $time->delete();
            $response = "Time deletado com sucesso.";
            return redirect('/admin-times')->with(['response' => $response]);
        } catch (\Exception $e) {
            $response = "Erro ao deletar time.";
            return redirect('/admin-times')->with(['response' => $response]);
        }
    }


}
