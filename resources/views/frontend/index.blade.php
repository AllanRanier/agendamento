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
                <h3 class="text-center mb-4">Grupos de Vacinação</h3>
                @if (count($agendas) > 0)
                    <div class="row mb-3">
                        @foreach ($agendas as $agenda)
                            @if ($agenda->data_final > date('Y-m-d H:i:s'))
                                {{-- <h4 class="text-center mb-4">TO no if</h4> --}}
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center mb-4">{{ $agenda->grupo->nome }}</h4>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('site.agendamento', [$agenda->grupo->id]) }}" class="btn btn-primary text-center">Agendar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h4 class="text-center mb-4">Nenhum grupo disponivel</h4>
                            @endif
                        @endforeach
                    </div>
                @else
                    <h4 class="text-center mb-4">Nenhum grupo disponivel</h4>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
