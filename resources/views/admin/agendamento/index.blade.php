@extends('adminlte::page')

@section('title', 'Lista de Agendamentos')

@section('content_header')
    <h1>Agendamentos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            @include('layouts.modal')
            @include('layouts.alert')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Grupo</th>
                            <th scope="col">Protocolo</th>
                            <th scope="col">Dia e horario</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($agendamentos) > 0)
                            @foreach ($agendamentos as $agendamento)
                                <tr>
                                    <td>{{ $agendamento->id }}</td>
                                    <td>{{ $agendamento->paciente->nome }}</td>
                                    <td>{{ $agendamento->grupo->nome }}</td>
                                    <td>{{ $agendamento->protocolo }}</td>
                                    <td>{{ Helper::mascara_data(@$agendamento->dia_horario, 'd/m/Y H:i')}}</td>
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('agendamentos.edit', ['id' => $agendamento->id]) }}"
                                            class="btn btn-primary btn-sm" title="Editar"><i
                                                class="fas fa-edit"></i></i></a>
                                        <a onclick="javascript:confirm_delete('Deseja realmente excluir o registro do agendamento selecionado?', '{{ route('agendamentos.destroy', ['id' => $agendamento->id]) }}');"
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
                    <b>Total Registros:</b> Geral ({{ $agendamentos->total() }}).
                </div>
                <div class="pagination pagination-sm p-2">
                    {{ $agendamentos->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
        <div class="card-footer mt-2">
            <a href="{{ route('agendamentos.index') }}" class="btn btn-secondary" style="margin-left: 5px"><i
                    class="fas fa-list-ul"></i> Listar</a>
            <a href="{{ route('agendamentos.create') }}" class="btn btn-primary" style="margin-left: 5px"><i
                    class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>
@stop
