@extends('adminlte::page')

@section('title', 'Pacientes')

@section('content_header')
@if (isset($pacientes))
<h1><b>Editando</b> o pacientes - {{ $pacientes['nome'] }}</h1>
@else
<h1><b>CADASTRO</b> - pacientes</h1>
@endif
@stop

@section('content')

<div class="card">
    <div class="card-body">
        @include('layouts.alert')
        <form
            action="{{ !@$paciente ? route('pacientes.store') : route('pacientes.update', ['id' => @$paciente['id']]) }}"
            method="POST">
            @csrf

            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" required
                            value="{{ @$paciente['nome'] ?? old('nome') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> CPF</label>
                        <input type="text" class="form-control cpf" name="cpf" id="cpf" required
                            value="{{ @$paciente['cpf'] ?? old('cpf') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Data de Nascimento</label>
                        <input type="date" class="form-control" name="nascimento" id="nascimento" required
                            value="{{ @$paciente['nascimento'] ?? old('nascimento') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> WhatsApp</label>
                        <input type="text" class="form-control phone" name="telefone1" id="telefone1" required
                            value="{{ @$paciente['telefone1'] ?? old('telefone1') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="text" class="form-control phone" name="telefone2" id="telefone2"
                            value="{{ @$paciente['telefone2'] ?? old('telefone2') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <label for=""><span style="color:red">*</span> CEP</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="cep" name="cep"
                            value="{{ @$paciente['cep'] ?? old('cep') }}">
                        <span class="input-group-text">
                            <span title="Clique para buscar endereço automático" style="cursor:pointer"
                                class="text-900 fs-1 far fa-map"></span>
                        </span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" required
                            value="{{ @$paciente['logradouro'] ?? old('logradouro') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" required
                            value="{{ @$paciente['numero'] ?? old('numero') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" required
                            value="{{ @$paciente['bairro'] ?? old('bairro') }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Cidade</label>
                        <input type="text" class="form-control cep" name="cidade" id="cidade" required
                            value="{{ @$paciente['cidade'] ?? old('cidade') }}">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for=""><span style="color:red">*</span> Estado</label>
                        <input type="text" class="form-control" name="uf" id="uf" required
                            value="{{ @$paciente['uf'] ?? old('uf') }}">
                    </div>
                </div>
            </div>

    </div>
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-check-circle"></i> Enviar</button>
        <a class="btn btn-sm btn-danger" href="{{ route('pacientes.create') }}"><i class="fa fa-ban"></i>
            Limpar</a>
        <a class="btn btn-sm btn-secondary" href="{{ route('pacientes.index') }}"><i class="fas fa-chevron-left"></i>
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
