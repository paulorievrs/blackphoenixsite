<?php

namespace App\Http\Controllers;

use App\Models\Tatic;
use App\Models\TaticImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaticImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $taticsimage = DB::table('taticsimage')->select('*')->orderByDesc('id')->paginate(7);

        return view('lime.taticimage', [ 'taticsimage' => $taticsimage ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $tatics = Tatic::all();
        return view('lime.create.taticimage', [ 'tatics' => $tatics ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->image->storeAs('tatics_img', $nameFile);
            if (!$upload) {
                return redirect()->back()->with(['response' => 'Falha ao fazer upload']);

            }
        }
        try {
            $tatic = new TaticImage();
            $tatic->imagename = $request->imagename;
            $tatic->imagelink = $nameFile;
            $tatic->tatic_id = $request->tatic_id;
            $tatic->save();
            $response = "Criado imagem da tática com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao criar imagem da tática!";

        }

        return redirect('/create-taticimage')->with(['response' => $response]);
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
        $taticimage = TaticImage::find($id);
        return view('lime.edit.taticimage', [ 'taticimage' => $taticimage]);
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
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->image->storeAs('tatics_img', $nameFile);
            if (!$upload) {
                return redirect()->back()->with(['response' => 'Falha ao fazer upload']);

            }
        }

        try {
            $tatic = TaticImage::find($id);
            $tatic->imagename = $request->imagename;
            $tatic->imagelink = $nameFile;
            $tatic->tatic_id = $request->tatic_id;
            $tatic->save();
            $response = "Alterado imagem da tática com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao altarar imagem da tática!";

        }

        return redirect('/admin-taticimage')->with(['response' => $response]);
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
            $tatic = TaticImage::find($id);
            $tatic->delete();
            $response = "Deletado com sucesso!";
        } catch (\Exception $e) {
            $response = "Erro ao deletar!";

        }

        return redirect('/admin-taticimage')->with(['response' => $response]);
    }
}
