@extends('layouts.app')

@section('head')
<link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">

    <style>
        #tabela thead tr th {
            border: 1px solid;
            padding: 5px;
        }

        #tabela tbody tr td {
            border: 1px solid;
            padding: 5px;
            text-align: center;
        }
    </style>
@endsection
@section('conteudo')
    <div class="row">
        @foreach ($grupos as $dia => $horas)
            @if ($dia != 1 && $dia !=7)
                <div class="col">
                    <div class="table-responsive">
                        <h4 class="text-center" style="border: 1px solid; min-width: 190px; margin-top: 10px; padding: 5px">
                            {{ $diaSemana->getDiaSemana($dia) }}</h4>
                        <table class="table" id="tabela" style="margin-top: -10px; min-width: 190px;">
                            <thead>
                                <tr class="text-center">
                                    <th>Hora inicio</th>
                                    <th>Hora fim</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($horas as $hora)
                                    <tr class="text-center" id="hora-{{$hora['id']}}">
                                        <td>{{ date('H:i', strtotime($hora['hora_inicio'])) }}</td>
                                        <td>{{ date('H:i', strtotime($hora['hora_fim'])) }}</td>
                                        <td><button class="btn btn-primary botao-reservar-horario" data-id="{{$hora['id']}}">reservar</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="row">
        @foreach ($grupos as $dia => $horas)
            @if ($dia == 1 || $dia ==7)
                <div class="col">
                    <div class="table-responsive">
                        <h4 class="text-center" style="border: 1px solid; min-width: 190px; margin-top: 10px; padding: 5px">
                            {{ $diaSemana->getDiaSemana($dia) }}</h4>
                        <table class="table" id="tabela" style="margin-top: -10px; min-width: 190px;">
                            <thead>
                                <tr class="text-center">
                                    <th>Hora inicio</th>
                                    <th>Hora fim</th>
                                    <th>Opção</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($horas as $hora)
                                    <tr class="text-center" id="hora-{{$hora['id']}}">
                                        <td>{{ date('H:i', strtotime($hora['hora_inicio'])) }}</td>
                                        <td>{{ date('H:i', strtotime($hora['hora_fim'])) }}</td>
                                        <td><button class="btn btn-primary botao-reservar-horario" data-id="{{$hora['id']}}">reservar</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/inicio/reserva/reservar-horario.js') }}"></script>
@endsection
