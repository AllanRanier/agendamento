<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Agendamento;
use App\Models\Paciente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::count();
        $agendamentos = Agendamento::count();
        $agendas = Agenda::count();
        // dd($pacientes);
        return view('admin.dashboard.index', compact('pacientes', 'agendas', 'agendamentos'));
    }
}
