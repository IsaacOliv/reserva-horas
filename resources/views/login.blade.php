<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziToast.min.css') }}" rel="stylesheet">

    <title>Conta</title>
    <style>
        #div-painel {
            display: flex;
            position: relative;
            justify-content: center;
            align-content: center;
            align-items: center;
            flex-direction: row;
            width: 100vw;
            height: 100vh;
        }

        .div-centro {
            width: 300px;
            height: 400px;
            border-radius: 50px;
            text-align: center;
            /* background-color: transparent; */
            background-color: #2F4F4F;
            /* opacity: 50%; */
        }

        #div-header {
            position: relative;
            justify-items: center;
            height: 10%;
            width: 100%;
            padding: 40px 0;
            margin-bottom: 5%;
        }

        #div-header-registro {
            position: relative;
            justify-items: center;
            height: 5%;
            width: 100%;
            padding: 40px 0;
            margin-bottom: 5%;
        }

        #div-conteudo {
            position: relative;
            justify-items: center;
            align-content: end;
            height: 50%;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-top: 10%;

        }

        #div-footer {
            margin-top: 10%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        #div-footer-cadastro {
            margin-top: 5%;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        button {
            background-color: #6495ED;
            border: 0px;
            width: 50%;
            border-radius: 10px
        }

        button:active {
            background-color: #557dc9;
        }

        .hide {
            display: none;
        }

        .div-botao{
            width: 100%;
            text-align: center;
            margin-top: 10%
        }

        input {
            border-radius: 100px;
            border: none;
        }
        a{
            text-decoration-line:none
        }
    </style>
</head>

<body>
    <div id="div-painel">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        {{-- login div --}}
        <div class="div-centro" id="div-login">
            <div id="div-header">
                <h5>Login</h5>
            </div>
            <form id="form-login" action="{{route('logar')}}">
                <div id="div-conteudo">
                    <h5>Email</h5>
                    <input type="text" name="email" id="email-login">
                    <h5>Senha</h5>
                    <input type="password" name="senha" id="senha-login">
                    <div class="div-botao">
                        <button id="botao-submeter">Confirmar</button>
                    </div>
                </div>
            </form>
            <div id="div-footer">
                <a href="#" id="trocar-formulario">Não tenho uma conta?</a>
            </div>
        </div>
        {{-- registro div --}}
        <div class="div-centro hide" id="div-registro">
            <div id="div-header-registro">
                <h5>Registro</h5>
            </div>
            <form id="form-registro" action="{{route('registro')}}">
                <div id="div-conteudo" style="margin-top: 5% !important;">
                    <h5>Nome</h5>
                    <input type="text" name="nome" id="nome-registro" required>
                    <h5>Email</h5>
                    <input type="text" name="email" id="email-registro" required>
                    <h5>Senha</h5>
                    <input type="password" name="senha" id="senha-registro" required>
                    <div class="div-botao">
                        <button id="botao-submeter-registro">Confirmar</button>
                    </div>
                </div>
            </form>
            <div id="div-footer-cadastro">
                <a href="#" id="trocar-formulario2">Tenha uma conta</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="{{ asset('js/login/troca-formularios.js') }}"></script>
    <script src="{{ asset('js/login/login.js') }}"></script>
    <script src="{{ asset('js/login/registro.js') }}"></script>
</body>
</html>
