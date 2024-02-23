@extends('layouts.app')
@section('head')
    <style>
        #editar-noticia {
            display: flex;
            position: relative;
            justify-content: center;

            & .formulario-noticia {
                width: 70%;
            }

        }

        #conteudo {
            resize: none;
        }

    </style>
@endsection
@section('conteudo')
    <form id="editar-noticia" action="{{route('noticias.store')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <div class="formulario-noticia">
            <div class="mt-3">
                <label class="form-label " for="titulo">Titulo <i title="CAMPO OBRIGATORIO"
                        style="color: red; font-size: 12px" class="bi bi-asterisk"></i></label>
                <div class="input-group">
                    <input type="text" class="form-control" name="titulo" id="titulo">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label class="form-label" for="imagem-perfil">Arquivos</label>
                    <input type="file" class="form-control" id="foto-time" name="foto_time" multiple>
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label" for="imagem-perfil">Conteudo <i title="CAMPO OBRIGATORIO"
                    style="color: red; font-size: 12px" class="bi bi-asterisk"></i></label>
                <div class="input-group">
                    <textarea class="form-control" name="conteudo" id="conteudo" rows="10"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="text-center mt-3">
                    <button id="botao-editar" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
        <div style="text-align: center; padding: 0 0 20px 0;" id="div-imagem">

        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('js/iziToast.min.js') }}"></script>

@endsection
