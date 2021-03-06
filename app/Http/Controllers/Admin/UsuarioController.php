<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioStoreRequest;
use App\Http\Requests\UsuarioUpdatRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;


class UsuarioController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(15);
        return view('admin.usuario.index', compact('usuarios'));
    }

    public function search(Request $request)
    {
        $usuarios = User::search($request->parametro, $request->informacao)->paginate(15);
        return view('admin.usuario.index', compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.form');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UsuarioStoreRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('usuarios.index')->with('sucesso', 'Cadastrado com sucesso.');
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
        $usuario = User::find($id);

        if ($usuario == null) {
            return redirect()->back()->with('error', 'Usu??rio n??o encontrado.');
        }

        return view('admin.usuario.form', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdatRequest $request, $id)
    {
        // editando com a senha para evitar erro
        if ($request->password) {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('usuarios.index')->with('sucesso', 'Usu??rio editado com sucesso.');
        }

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('usuarios.index')->with('sucesso', 'Usu??rio editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('sucesso', 'Usu??rio exclu??do com sucesso.');
    }
}
