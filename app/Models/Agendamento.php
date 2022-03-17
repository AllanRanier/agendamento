<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'agendamento';

    protected $fillable = [
        'paciente_id',
        'grupo_id',
        'protocolo',
        'dia_horario',
    ];


    // Relacionamentos
    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
