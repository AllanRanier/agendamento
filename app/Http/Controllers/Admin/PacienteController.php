<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteStoreUpdateRequest;
use App\Models\Grupo;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(15);

        return view('admin.paciente.index', compact('pacientes'));
    }

    public function search(Request $request)
    {
        $pacientes = Paciente::search($request->parametro, $request->informacao)->paginate(15);
        return view('admin.paciente.index', compact('pacientes'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paciente.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteStoreUpdateRequest $request)
    {
        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('sucesso', 'Cadastrado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);

        if ($paciente == null) {
            return redirect()->back()->with('error', 'paciente não encontrado.');
        }

        return view('admin.paciente.form', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteStoreUpdateRequest $request, $id)
    {
        Paciente::find($id)->update($request->all());

        return redirect()->route('pacientes.index')->with('sucesso', 'Editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Paciente::find($id)->delete();

        return redirect()->back()->with('sucesso', 'Excluído com sucesso.');
    }
}
