<?php

namespace App\Http\Controllers\FrontEnd;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacienteStoreUpdateRequest;
use App\Models\Agenda;
use App\Models\Grupo;
use App\Models\Paciente;
use Illuminate\Http\Request;

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

    public function cadastrarAgendamento($agendaId, PacienteStoreUpdateRequest $request)
    {
        dd($request->all(), $agendaId);
    }
}
