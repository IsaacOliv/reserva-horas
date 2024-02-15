@extends('layouts.app')
@section('head')
    <style>
        .formulario-conta {
            margin: 2% auto;
        }
    </style>
@endsection
@section('conteudo')
    <form action="{{route('editar-detalhes-da-conta', ['id' => $usuario->id])}}" method="post">
        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
        <div class="formulario-conta">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Primeiro nome</label>
                    <input type="text" class="form-control" placeholder="Fulano" value="{{ $usuario->nome }}" name="nome" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Sobrenome</label>
                    <input type="text" class="form-control" placeholder="de ciclano" name="sobrenome" disabled>
                </div>
            </div>
            <label class="form-label" for="imagem-perfil">Enderço</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Rua dos fulanos numero 0000" name="endereco" disabled>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">CPF</label>
                    <input type="text" class="form-control" placeholder="000.000.000-00" name="cpf" id="cpf" maxlength="14" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Telefone</label>
                    <input type="text" class="form-control" placeholder="(00)00000-0000" name="telefone" id="telefone" maxlength="20" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Foto do time</label>
                    <input type="file" class="form-control" id="foto-time" name="foto_time" disabled>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="imagem-perfil">Data de nascimento</label>
                    <input type="date" class="form-control" id="data" name="dt_nascimento" disabled>
                </div>
            </div>
            <div class="row">
                <div class="text-center mt-5">
                    <button id="botao-editar" class="btn btn-warning">Editar</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/conta/detalhes-da-conta.js') }}"></script>
@endsection
