@extends('layouts.app')

@section('head')
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
        .central{
            display: flex;
            text-align: center;
            position: relative;
            justify-content: center;
        }
    </style>
@endsection
@section('conteudo')

    <div class="central">
        <div class="card">
            <h1>Hello world</h1>

        </div>
    </div>
@endsection
