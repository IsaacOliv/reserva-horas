@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">

    <style>
        .formulario-conta {
            margin: 2% auto;
        }
    </style>
@endsection
@section('conteudo')
    <form action="{{ route('editar-detalhes-da-conta', ['id' => $usuario->id]) }}" method="post"
        enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="formulario-conta">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Primeiro nome <i title="CAMPO OBRIGATORIO" style="color: red; font-size: 12px"
                            class="bi bi-asterisk"></i></label>
                    <input type="text" class="form-control" placeholder="Fulano" value="{{ $usuario->nome }}"
                        name="nome" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Sobrenome <i title="CAMPO OBRIGATORIO" style="color: red; font-size: 12px"
                            class="bi bi-asterisk"></i></label>
                    <input type="text" class="form-control" placeholder="de ciclano" name="sobrenome"
                        value="{{ $usuario->detalhes->sobrenome ?? '' }}" disabled>
                </div>
            </div>
            <label class="form-label" for="imagem-perfil">Endereço</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rua dos fulanos numero 0000" name="endereco"
                    value="{{ $usuario->detalhes->endereco ?? '' }}" disabled>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">CPF <i title="CAMPO OBRIGATORIO" style="color: red; font-size: 12px"
                            class="bi bi-asterisk"></i></label>
                    <input type="text" class="form-control" placeholder="000.000.000-00" name="cpf" id="cpf"
                        maxlength="14" value="{{ $usuario->detalhes->cpf ?? '' }}" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Telefone <i title="CAMPO OBRIGATORIO" style="color: red; font-size: 12px"
                            class="bi bi-asterisk"></i></label>
                    <input type="text" class="form-control" placeholder="(00)00000-0000" name="telefone" id="telefone"
                        maxlength="14" value="{{ $usuario->detalhes->telefone ?? '' }}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Foto do time</label>
                    <input type="file" class="form-control" id="foto-time" name="foto_time" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Data de nascimento <i title="CAMPO OBRIGATORIO" style="color: red; font-size: 12px"
                            class="bi bi-asterisk"></i></label>
                    <input type="date" class="form-control" id="data" name="dt_nascimento"
                        value="{{ $usuario->detalhes && $usuario->detalhes->dt_nascimento ? $usuario->detalhes->dt_nascimento->format('Y-m-d') : '' }}"disabled>
                </div>
            </div>
            <div class="row">
                <div class="text-center mt-5">
                    <button id="botao-editar" class="btn btn-warning">Editar</button>
                </div>
            </div>
        </div>
        <div style="text-align: center; padding: 0 0 20px 0;" id="div-imagem">
            @if (
                $usuario->detalhes &&
                    $usuario->detalhes->imagem_time &&
                    file_exists(public_path('storage/' . $usuario->detalhes->imagem_time)))
                <img style="text-align: center; max-width: 30vw"
                    src="{{ asset("storage/{$usuario->detalhes->imagem_time}") }}" alt="imagem do time">
            @endif
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/conta/detalhes-da-conta.js') }}"></script>
@endsection
