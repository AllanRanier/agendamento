<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgendaStoreUpdateRequest;
use App\Models\Agenda;
use App\Models\Grupo;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::paginate(15);

        return view('admin.agenda.index', compact('agendas'));
    }


    public function search(Request $request)
    {
        $agendas = Agenda::search($request->parametro, $request->informacao)->paginate(15);

        return view('admin.grupo.index', compact('agendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::orderBy('id', 'ASC')->get();

        return view('admin.agenda.form', compact('grupos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaStoreUpdateRequest $request)
    {
        Agenda::create($request->all());

        return redirect()->route('agendas.index')->with('sucesso', 'Cadastrado com sucesso.');
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
        $agenda = Agenda::find($id);

        if ($agenda == null) {
            return redirect()->back()->with('error', 'Agenda não encontrado.');
        }
        $grupos = Grupo::orderBy('id', 'ASC')->get();

        return view('admin.agenda.form', compact('agenda', 'grupos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaStoreUpdateRequest $request, $id)
    {
        Agenda::find($id)->update($request->all());

        return redirect()->route('agendas.index')->with('sucesso', 'Editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agenda::find($id)->delete();

        return redirect()->back()->with('sucesso', 'Excluído com sucesso.');
    }
}
