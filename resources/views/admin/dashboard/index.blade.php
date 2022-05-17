@extends('adminlte::page')

@section('title', 'Agendamento - Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $agendamentos }}</h3>
                    <p>Agendamentos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-calendar-check"></i>
                </div>
                <a href="{{ route('agendamentos.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $agendas }}</h3>
                    <p>Agendas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-calendar"></i>
                </div>
                <a href="{{ route('agendas.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pacientes }}</h3>
                    <p>Pacientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-fw fa-user-injured"></i>
                </div>
                <a href="{{ route('pacientes.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


    </div>

@stop
