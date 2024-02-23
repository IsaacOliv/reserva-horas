@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <style>
        .central {
            display: flex;
            text-align: center;
            position: relative;
            justify-content: center;
            padding: 10px 0 0 0;
            width: 100%;
        }

        .table {
            width: 50% !important;
        }
    </style>
@endsection
@section('conteudo')
    <div class="central">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarioComHorario->horariosReservados as $item)
                    <tr id="reserva-{{ $item->id }}">
                        <td>{{ $item->horario->getDiaSemana() }}</td>
                        <td>{{ $item->horario->hora_inicio }}</td>
                        <td>{{ $item->horario->hora_fim }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm btn-desmarcar"
                                data-id="{{ $item->id }}">Desmarcar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/horaio-reservado/desmarcar-horario.js') }}"></script>
@endsection
