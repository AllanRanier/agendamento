<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'paciente';

    protected $fillable = [
        'nome',
        'cpf',
        'telefone1',
        'telefone2',
        'nascimento',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
    ];


    public function setCpfAttribute($value)
    {
        $cpf = Helper::somente_numero($value);
        Helper::validar_cpf($cpf);
        $this->attributes['cpf'] = $cpf;
    }
    public function getCpfAttribute($value)
    {
        return Helper::mascara_string($value, '###.###.###-##');
    }

    public function setTelefone1Attribute($value)
    {
        $Telefone1 = Helper::somente_numero($value);
        $this->attributes['Telefone1'] = $Telefone1;
    }
    public function getTelefone1Attribute($value)
    {
        return Helper::mascara_string($value, '(##) #####-####');
    }

    public function setTelefone2Attribute($value)
    {

        $this->attributes['Telefone2'] = Helper::somente_numero($value);;
    }
    public function getTelefone2Attribute($value)
    {
        return Helper::mascara_string($value, '(##) #####-####');
    }

    public function setcepAttribute($value)
    {
        $this->attributes['cep'] = Helper::somente_numero($value);
    }
    public function getcepAttribute($value)
    {
        return Helper::mascara_string($value, '(##) #####-####');
    }


    public static function search($parametro, $informacao)
    {
        return Paciente::where($parametro, 'LIKE', "%$informacao%")->orderBy('id', 'ASC');
    }

}
