<?php

namespace App\Http\Controllers\FrontEnd;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteStoreUpdateRequest;
use App\Models\Agenda;
use App\Models\Agendamento;
use App\Models\Grupo;
use App\Models\Paciente;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();
        $data = date('Y-m-d H:i:s');
        // dd($agendas[0]['data_final'] , $data);
        return view('frontend.index', compact('agendas'));
    }

    public function agendamento($agendaId)
    {
        $agenda = Agenda::find($agendaId);
        if (is_null($agenda)) {
            return redirect()->back()->with('error', 'Agenda não encontrado.');
        }
        return view('frontend.agendamento.index', compact('agenda'));
    }

    public function cadastrarAgendamento($grupoId, PacienteStoreUpdateRequest $request)
    {
        $data = $request->all();
        // dd($data, $grupoId);
        $paciente = Paciente::create($data);

        $agendamento = Agendamento::create([
            'paciente_id'   => $paciente->id,
            'grupo_id'      => $grupoId,
            'protocolo'      => Helper::gerandoProtocolo(),
            'dia_horario'   => $request->dia_horario
        ]);


        return redirect()->route('site.concluido', $agendamento->id)->with('sucesso', 'Cadastrado com sucesso.');
    }

    public function concluidoAgendamento($id)
    {
        $agendamento = Agendamento::find($id);
        if (is_null($agendamento)) {
            return redirect()->back()->with('error', 'Erro ao carregar a página.');
        }
        return view('frontend.agendamento.concluido', compact('agendamento'));
    }

    public function gerarPDF($id)
    {
        $agendamento = Agendamento::where('id', $id)->get();
        // dd($agendamento);
        if (is_null($agendamento)) {
            return redirect()->back()->with('error', 'Erro ao carregar a página.');
        }

        return \PDF::loadView('frontend.pdf.download', compact('agendamento'))
        //  Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
         ->download('comprovante.pdf');
    }

}
