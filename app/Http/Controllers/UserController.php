<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->select('name', 'email as user_email')->get();

        return \response($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if($request->adminCode !== 'vilagger') {
            return redirect('/register')->withErrors('adminCode', 'Erro no código de administrador');
        }

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->remember_token;
        $user->twitch_username = $request->twitch_username;
        $user->local = $request->local;
        $user->profileimagelink = $request->local;
        $user->bannerimagelink = $request->bannerimagelink;
        $user->save();

        return true;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View|Response
     */
    public function edit()
    {
        $user = Auth::user();
        $links = DB::table('links')->select('*')->where('user_id', '=', $user->id)->get();

        return view('lime.edit-profile', [ 'links' => $links ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->twitch_username = $request->twitch_username;
            $user->bio = $request->bio;
            $user->local = $request->local;
            $user->save();
            $response = "Alterado dados com sucesso!";


        } catch (\Exception $e) {
            $response = "Erro ao alterar dados!";
        }
        return redirect('/edit-profile')->with(['response' => $response]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile($twitch_username)
    {

        $user = DB::table('users')->select('*')->where('twitch_username','=', $twitch_username)->first();
        $links = DB::table('links')->select('*')->where('user_id', '=', $user->id)->get();
        //        $user = User::find($user->id);
        return view('lime.profileuser', ['user' => $user, 'links' => $links]);
    }

    public function updatePassword(Request $request)
    {
        try {
             $this->validate(request(), [
                'password' => 'required',
            ]);
        } catch (\Exception $e) {
            $response = "Preencha a senha!";
            return redirect('/edit-profile')->with(['response' => $response]);

        }
        $id = Auth::user()->id;
        try {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->save();
            $response = "Alterado sua senha com sucesso!";


        } catch (\Exception $e) {
            $response = "Erro ao alterar senha!";
        }
        return redirect('/edit-profile')->with(['response' => $response]);

    }

    public function updateProfileImageLink(Request $request)
    {
        $nameFile = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));

            $extension = $request->image->extension();

            $nameFile = "{$name}.{$extension}";

            $upload = $request->image->storeAs('user_img', $nameFile);
            if (!$upload) {
                return redirect()->back()->with(['response' => 'Falha ao fazer upload']);

            }
            try {
                $id = Auth::user()->id;
                $user = User::find($id);
                $user->profileimagelink = $nameFile;
                $user->save();
                $response = "Imagem alterada com sucesso!";
            } catch (\Exception $e) {
                $response = "Erro ao alterar imagem";
            }

            return redirect()->back()->with(['response' => $response]);


        }

    }

}
