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
                <h3 class="text-center mb-4">Agendamento realizado com sucesso</h3>

                <div class="justify-content-center align-items-cente row">
                    <div class="col-3">
                        <a class="btn btn-info btn-sm" href="{{ route('pdf', [$agendamento->id]) }}">Baixar Comprovante do agendamento</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/mask/jquery.mask.js"></script>
    <script src="/js/meus_scripts.js"></script>
</body>

</html>
