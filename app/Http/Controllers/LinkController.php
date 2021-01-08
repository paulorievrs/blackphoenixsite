<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

            $request->validate([
                'name' => 'required',
                'link' => 'required',
            ]);

            $link = new Link();
            $link->name = $request->name;
            $link->link = $request->link;
            $link->user_id = Auth::user()->id;
            $link->save();
            $response = "Link criado com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao criar link!";
        }

        return redirect('/edit-profile')->with(['response' => $response]);



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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        try {
            $link = Link::find($id);
            $link->name = $request->name;
            $link->link = $request->link;
            $link->user_id = $request->user_id;
            $link->save();
            $response = "Link alterado com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao alterar link!";

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
            $link = Link::find($id);
            $link->delete();
            $response = "Link deletado com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao alterar link!";

        }
        return redirect('/edit-profile')->with(['response' => $response]);


    }
}
