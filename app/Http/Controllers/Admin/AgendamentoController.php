<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Grupo;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamentos = Agendamento::paginate(15);

        return view('admin.agendamento.index', compact('agendamentos'));
    }


    public function search(Request $request)
    {
        $agendamentos = Grupo::search($request->parametro, $request->informacao)->paginate(15);
        return view('admin.grupo.index', compact('agendamentos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupos = Grupo::orderBy('id', 'ASC')->get();
        $pacientes = Paciente::orderBy('id', 'ASC')->get();

        return view('admin.agendamento.form', compact('grupos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['protocolo'] = Helper::gerandoProtocolo();
        Agendamento::create($data);

        return redirect()->route('agendamentos.index')->with('sucesso', 'Cadastrado com sucesso.');
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
        $agendamento = Agendamento::find($id);

        if ($agendamento == null) {
            return redirect()->back()->with('error', 'Grupo não encontrado.');
        }

        // dd($agendamento);

        $grupos = Grupo::orderBy('id', 'ASC')->get();
        $pacientes = Paciente::orderBy('id', 'ASC')->get();

        return view('admin.agendamento.form', compact('agendamento', 'grupos', 'pacientes'));
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
        Agendamento::find($id)->update($request->all());

        return redirect()->route('agendamentos.index')->with('sucesso', 'Editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agendamento::find($id)->delete();

        return redirect()->back()->with('sucesso', 'Excluído com sucesso.');
    }
}
