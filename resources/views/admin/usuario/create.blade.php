@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    @if ()
<h1><b>CADASTRO</b> - Usuário</h1>
    @else
        <h1><b>CADASTRO</b> - Usuário</h1>
    @endif
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <!-- Validation Errors -->
            {{-- <x-auth-validation-errors class="mb-4 alert alert-danger" :errors="$errors" /> --}}
            @include('layouts.alert')
            <form
                action="{{ !@$usuario ? route('usuarios.store') : route('usuarios.update', ['id' => @$usuario['id']]) }}"
                method="POST">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> Nome</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="" required
                                value="{{ @$usuario['name'] ?? old('name') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for=""><span style="color:red">*</span> E-mail (Login)</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="" required
                                value="{{ @$usuario['email'] ?? old('email') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-sm-4">
                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="">
                        </div>
                    </div>
                    <div class="col col-sm-4">
                        <div class="form-group">
                            <label for="">Senha (Confirmação)</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                placeholder="">
                        </div>
                    </div>
                </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-check-circle"></i> Enviar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('usuarios.create') }}"><i class="fa fa-ban"></i>
                Limpar</a>
            <a class="btn btn-sm btn-secondary" href="{{ route('usuarios.index') }}"><i class="fas fa-chevron-left"></i>
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
