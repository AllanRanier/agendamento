@extends('adminlte::page')

@section('title', 'Lista de Pacientes')

@section('content_header')
    <h1>Pacientes</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            @include('layouts.modal')
            @include('layouts.alert')
            <form action="{{ route('pacientes.search') }}" method="get">
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="parametro" name="parametro">
                            <option value="id">ID</option>
                            <option value="nome">Nome</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" id="informacao" name="informacao" placeholder="Infome os dados de sua busca">
                    </div>
                    <button type="submit" class="btn btn-info">Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pacientes) > 0)
                            @foreach ($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->id }}</td>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>{{ $paciente->fone1 }}</td>
                                    <td>{{ $paciente->cpf }}</td>
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('pacientes.edit', ['id' => $paciente->id]) }}"
                                            class="btn btn-primary btn-sm" title="Editar"><i
                                                class="fas fa-edit"></i></i></a>
                                        <a onclick="javascript:confirm_delete('Deseja realmente excluir o registro do paciente: {{ $paciente->nome }}, selecionado?', '{{ route('pacientes.destroy', ['id' => $paciente->id]) }}');"
                                            class="btn btn-danger btn-sm" title="Excluir"><i
                                                class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="12" class="text-center">Nenhum registro cadastrado!</th>
                            </tr>
                        @endif
                    </tbody>
                </table>


            </div>
            <div class="mb-3 d-flex">
                <div class="p-2 mr-auto small">
                    <b>Total Registros:</b> Geral ({{ $pacientes->total() }}).
                </div>
                <div class="p-2 pagination pagination-sm">
                    {{ $pacientes->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
        <div class="mt-2 card-footer">
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary" style="margin-left: 5px"><i
                    class="fas fa-list-ul"></i> Listar</a>
            <a href="{{ route('pacientes.create') }}" class="btn btn-primary" style="margin-left: 5px"><i
                    class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
@stop
