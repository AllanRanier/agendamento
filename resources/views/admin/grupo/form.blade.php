@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
    @if (isset($grupo))
        <h1><b>Editando</b> o grupo - {{ $grupo['name'] }}</h1>
    @else
        <h1><b>CADASTRO</b> - Grupo</h1>
    @endif
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            @include('layouts.alert')
            <form action="{{ !@$grupo ? route('grupos.store') : route('grupos.update', ['id' => @$grupo['id']]) }}"
                method="POST">
                @csrf

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" placeholder="" required
                                value="{{ @$grupo['nome'] ?? old('nome') }}">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-check-circle"></i> Enviar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('grupos.create') }}"><i class="fa fa-ban"></i>
                Limpar</a>
            <a class="btn btn-sm btn-secondary" href="{{ route('grupos.index') }}"><i class="fas fa-chevron-left"></i>
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
