@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuários</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <form action="" method="get">
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
            <div class="row flex-between-end mt-3  justify-content-end">
                <div class="col-auto align-self-right small mt-1">
                    <b>Total Registros:</b> Geral ({{ $usuarios->total() }}).
                </div>
                <div class="col-auto align-self-left">
                    <div class="pagination pagination-md">
                        {{ $usuarios->links('pagination::bootstrap-4') }}
                    </div>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
