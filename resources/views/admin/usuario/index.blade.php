@extends('adminlte::page')

@section('title', 'Lista de Usuários')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            @include('layouts.modal')
            @include('layouts.alert')
            <form action="{{ route('usuarios.search') }}" method="get">
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="parametro" name="parametro">
                            <option value="id">ID</option>
                            <option value="name">Nome</option>
                            <option value="email">E-mail</option>
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
                            <th scope="col">E-mail</th>
                            <th scope="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($usuarios) > 0)
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td style="white-space: nowrap">
                                        <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}"
                                            class="btn btn-primary btn-sm" title="Editar"><i
                                                class="fas fa-edit"></i></i></a>
                                        <a onclick="javascript:confirm_delete('Deseja realmente excluir o registro do usuário: {{ $usuario->name }}, selecionado?', '{{ route('usuarios.destroy', ['id' => $usuario->id]) }}');"
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
                    <b>Total Registros:</b> Geral ({{ $usuarios->total() }}).
                </div>
                <div class="pagination pagination-sm p-2">
                    {{ $usuarios->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
        <div class="card-footer mt-2">
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary" style="margin-left: 5px"><i
                    class="fas fa-list-ul"></i> Listar</a>
            <a href="{{ route('usuarios.create') }}" class="btn btn-primary" style="margin-left: 5px"><i
                    class="fas fa-plus-circle"></i> Cadastrar</a>
        </div>
    </div>

@stop
