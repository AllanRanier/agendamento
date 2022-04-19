<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function buscarCpf($cpf)
    {
        $paciente = Paciente::where('cpf', Helper::somente_numero($cpf))->get();
        if (sizeof($paciente) == 0) {
            return response()->json(['paciente' => $paciente, 'status' => 400]);
        }

        return response()->json(['paciente' => $paciente, 'status' => 201]);
    }
}
