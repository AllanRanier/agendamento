<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GrupoStoreUpdateRequest;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::paginate(15);

        return view('admin.grupo.index', compact('grupos'));
    }


    public function search(Request $request)
    {
        $grupos = Grupo::search($request->parametro, $request->informacao)->paginate(15);
        return view('admin.grupo.index', compact('grupos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.grupo.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Grupo::create($request->all());

        return redirect()->route('grupos.index')->with('sucesso', 'Cadastrado com sucesso.');
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
        $grupo = Grupo::find($id);

        if ($grupo == null) {
            return redirect()->back()->with('error', 'Grupo não encontrado.');
        }

        return view('admin.grupo.form', compact('grupo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrupoStoreUpdateRequest $request, $id)
    {
        Grupo::find($id)->update($request->all());

        return redirect()->route('grupos.index')->with('sucesso', 'Grupo editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grupo::find($id)->delete();

        return redirect()->back()->with('sucesso', 'Grupo excluído com sucesso.');
    }
}
