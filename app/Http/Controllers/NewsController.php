<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->select('*')->orderByDesc('postDate')->paginate(5);

        return view('front.blog', [ 'news' => $news ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('lime.create.news');
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

            $news = new News();
            $news->title = $request->title;
            $news->text = $request->text;
            $news->postDate = (date('Y-m-d'));
            $news->user_id = Auth::user()->id;
            $news->save();
            $response = "Notícia publica com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao publicar notícia!";
        }

        return redirect('/admin-news')->with(['response' => $response]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('front.blog-single', [ 'news' => $news ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('lime.edit.news', [ 'news' => $news ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, int $id)
    {
        try {
            $news = News::find($id);
            $news->title = $request->title;
            $news->text = $request->text;
            $news->postDate = (date('Y-m-d'));
            $news->user_id = Auth::user()->id;
            $news->save();
            $response = "Notícia alterada com sucesso!";


        } catch (\Exception $e) {
            $response = "Erro ao alterar notícia!";
        }

        return redirect('/admin-news')->with([ 'response' => $response ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $news = News::find($id);

            $news->delete();
            $response = "Notícia deletada com sucesso!";

        } catch (\Exception $e) {
            $response = "Erro ao deletar notícia!";
        }
    }

    public function listNews()
    {
        $news = DB::table('news')->select('*')->orderByDesc('postDate')->paginate(10);

        return view('lime.news', [ 'news' => $news ]);
    }
}
