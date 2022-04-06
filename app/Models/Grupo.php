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
        'nome',
    ];

    public static function search($parametro, $informacao)
    {
        return Grupo::where($parametro, 'LIKE', "%$informacao%")->orderBy('id', 'ASC');
    }
}
