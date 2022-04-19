<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.theme.head')
</head>

<body style="background-color: #c8c8c8">
    @include('frontend.theme.navbar')

    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                @include('layouts.alert')
                <h3 class="text-center mb-4">Vacinação</h3>
                <form action="{{ route('site.cadastro', $agenda->grupo->id) }}" method="POST">
                    @csrf
                    <input type="text" class="d-none" value="{{ $agenda->id }}">
                    <input type="text" class="d-none" value="{{ $agenda->grupo->id }}">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for=""><span style="color:red">*</span> Dia e horario da vicinação</label>
                                <input type="datetime-local" class="form-control" name="dia_horario" id="dia_horario"
                                    required value=""">
                        </div>
                    </div>
                </div>
                    <div class=" row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Nome</label>
                                        <input type="text" class="form-control" name="nome" id="nome" required
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> CPF</label>
                                        <input type="text" class="form-control cpf" name="cpf" id="cpf" required
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Data de Nascimento</label>
                                        <input type="date" class="form-control" name="nascimento" id="nascimento"
                                            required value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> WhatsApp</label>
                                        <input type="text" class="form-control phone" name="telefone1" id="telefone1"
                                            required value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="">Telefone</label>
                                        <input type="text" class="form-control phone" name="telefone2" id="telefone2"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <label for=""><span style="color:red">*</span> CEP</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="cep" name="cep" value="">
                                        <span class="input-group-text">
                                            <span title="Clique para buscar endereço automático" style="cursor:pointer"
                                                class="text-900 fs-1 far fa-map"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Logradouro</label>
                                        <input type="text" class="form-control" name="logradouro" id="logradouro"
                                            required value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-2 col-lg-2">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Número</label>
                                        <input type="text" class="form-control" name="numero" id="numero" required
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Bairro</label>
                                        <input type="text" class="form-control" name="bairro" id="bairro" required
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Cidade</label>
                                        <input type="text" class="form-control cep" name="cidade" id="cidade" required
                                            value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label for=""><span style="color:red">*</span> Estado</label>
                                        <input type="text" class="form-control" name="uf" id="uf" required value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit"><i class="far fa-check-circle"></i>
                                Enviar</button>
                            <a class="btn btn-sm btn-danger" href="{{ route('agendamentos.create') }}"><i
                                    class="fa fa-ban"></i>
                                Limpar</a>
                            <a class="btn btn-sm btn-secondary" href="{{ route('agendamentos.index') }}"><i
                                    class="fas fa-chevron-left"></i>
                                Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="/js/mask/jquery.mask.js"></script>
    <script src="/js/meus_scripts.js"></script>
</body>

</html>
