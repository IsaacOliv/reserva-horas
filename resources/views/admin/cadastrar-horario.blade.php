@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">
    <style>
        td,
        th {
            border: 1px solid;
            padding: 10px;
        }

        #selecionar-dia {
            display: block;
            text-align: center;
            width: 10vw !important;
            min-width: 150px;
        }

        #body-dias-da-semana tr td {
            text-align: center;
            display: block;
            width: 10vw;
            min-width: 150px;
        }

        #body-dias-da-semana tr td button {
            width: 7vw;
            min-width: 120px;
        }
    </style>
@endsection
@section('conteudo')
        <div style="display: flex; justify-content: center; align-items: center;">
            <form class="row g-3" id="cadastro-horario">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="col-md-6">
                    <label for="hora_inicio" class="form-label">Inicio</label>
                    <input type="time" class="form-control" name="hora_inicio" id="hora_inicio">
                </div>
                <div class="col-md-6">
                    <label for="hora_fim" class="form-label">Fim</label>
                    <input type="time" class="form-control" name="hora_fim" id="hora_fim">
                </div>
                <div class="col-md-12">
                    <label for="dia_semana" class="form-label">Dia da semana:</label>
                    <select class="form-select" name="dia_semana" id="dia_semana">
                        <option selected disabled>-</option>

                        @for ($i = 1; $i <= 7; $i++)
                            <option value="{{ $i }}">{{ $horarios->getDiaSemana($i) }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <hr>
        <div class="row" style="padding: 0 10px;">
            <div class="col-md-2">
                <table>
                    <thead>
                        <tr>
                            <th id="selecionar-dia">Dias</th>
                        </tr>
                    </thead>
                    <tbody id="body-dias-da-semana">
                        @for ($i = 1; $i <= 7; $i++)
                            <tr class="tr-dias-da-semana">
                                <td>
                                    <button id="filtrar-dia" class="btn btn-primary"
                                        data-dia="{{ $i }}">{{ $horarios->getDiaSemana($i) }}</button>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>


            <div class="col-md-4 offset-2">
                <div class="table-responsive" id="tabela-de-horarios">
                    <table id="tabela-vazia">
                        <thead>
                            <tr class="text-center">
                                <th>Hora inicio</th>
                                <th>Hora fim</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody id="table-hora">

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/horario/delete.js') }}"></script>
    <script src="{{ asset('js/horario/registro.js') }}"></script>
    <script src="{{ asset('js/horario/mostrar-horarios.js') }}"></script>
@endsection
