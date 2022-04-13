@extends('adminlte::page')

@section('title', 'Agendas')

@section('content_header')
    @if (isset($agendamento))
        <h1><b>Editando</b> - Agendamentos</h1>
    @else
        <h1><b>CADASTRO</b> - Agenda</h1>
    @endif
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            @include('layouts.alert')
            <form action="{{ !@$agendamento ? route('agendamentos.store') : route('agendamentos.update', ['id' => @$agendamento['id']]) }}"
                method="POST">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> Paciente</label>
                            <select class="form-control" name="paciente_id" id="paciente_id">
                                <option value="">Selecionar</option>
                                @foreach ($pacientes as $option)
                                    <option @if ($option->id == old('paciente_id') || $option->id == @$agendamento->paciente_id) selected @endif  value="{{ $option->id }}">{{ $option->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> Grupo</label>
                            <select class="form-control" name="grupo_id" id="grupo_id">
                                <option value="">Selecionar</option>
                                @foreach ($grupos as $option)
                                    <option @if ($option->id == old('grupo_id') || $option->id == @$agendamento->grupo_id) selected @endif  value="{{ $option->id }}">{{ $option->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> Data Final da Vacinação</label>
                            <input type="datetime-local" class="form-control" name="dia_horario" id="dia_horario"
                                value="{{ Helper::mascara_data(@$agendamento->dia_horario, 'Y-m-d\TH:i') ?? old('dia_horario') }}">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-check-circle"></i> Enviar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('agendamentos.create') }}"><i class="fa fa-ban"></i>
                Limpar</a>
            <a class="btn btn-sm btn-secondary" href="{{ route('agendamentos.index') }}"><i class="fas fa-chevron-left"></i>
                Voltar</a>
        </div>
    </div>
    </form>
    </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
