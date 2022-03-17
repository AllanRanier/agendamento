<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'grupo';

    protected $fillable = [
        'nome_grupo',
        'periodo',
        'periodo_final',
    ];
}
