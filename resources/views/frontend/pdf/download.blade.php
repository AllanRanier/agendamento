<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Título Opcional</title>
    <style>
        .pai {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            height: 100%;
        }

        .filho {
            align-self: center;
        }

    </style>

</head>

<body>
    <h1>Comprovante de Agendamento</h1>
    <ul>
        @foreach ($agendamento as $data)
            <li>Paciente: {{ $data->paciente->nome }}</li>
            <li>Protocolo: {{ $data->protocolo }}</li>
            <li>Data da vacinação: {{ Helper::mascara_data($data->dia_horario, 'd/m/Y') }}</li>
        @endforeach
    </ul>
</body>

</html>
