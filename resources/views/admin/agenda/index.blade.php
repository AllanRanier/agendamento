@extends('adminlte::page')

@section('title', 'Lista de Agendas')

@section('content_header')
    <h1>Agendas</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            @include('layouts.modal')
            @include('layouts.alert')
            <form action="{{ route('agendas.search') }}" method="get">
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
                            <th scope="col">Grupo</th>
                            <th scope="col">Data da Vacinação</th>
                            <th scope="col">Data Final da Vacinação</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($agendas) > 0)
                            @foreach ($agendas as $agenda)
                                <tr>
                                    <td>{{ $agenda->id }}</td>
                                    <td>{{ $agenda->grupo->nome }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($agenda->data_inicial)) }}</td>
                                    <td>{{ date('d/m/Y H:i', strtotime($agenda->data_final)) }}</td>
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('agendas.edit', ['id' => $agenda->id]) }}"
                                            class="btn btn-primary btn-sm" title="Editar"><i
                                                class="fas fa-edit"></i></i></a>
                                        <a onclick="javascript:confirm_delete('Deseja realmente excluir o registro do agenda: {{ $agenda->nome }}, selecionado?', '{{ route('agendas.destroy', ['id' => $agenda->id]) }}');"
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
            <div class="d-flex mb-3">
                <div class="mr-auto small p-2">
                    <b>Total Registros:</b> Geral ({{ $agendas->total() }}).
                </div>
                <div class="pagination pagination-sm p-2">
                    {{ $agendas->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
        <div class="card-footer mt-2">
            <a href="{{ route('agendas.index') }}" class="btn btn-secondary" style="margin-left: 5px"><i
                    class="fas fa-list-ul"></i> Listar</a>
            <a href="{{ route('agendas.create') }}" class="btn btn-primary" style="margin-left: 5px"><i
                    class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
@stop
