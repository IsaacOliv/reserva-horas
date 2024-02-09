<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        aside {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-tertiary-bg-rgb), var(--bs-bg-opacity)) !important;
        }

        footer {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-tertiary-bg-rgb), var(--bs-bg-opacity)) !important;
            height: 6vh;
        }

        #row-principal {
            width: 100%
        }

        main {
            min-height: 89vh;
        }
        #barra-lateral a{
           padding: 10px;
           border: 1px solid;
           border-radius: 100px;
           gap: 5px;
        }
    </style>
    @yield('head')
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="dropdown ms-auto" style="padding: 0 5px">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{\Illuminate\Support\Facades\Auth::user()->nome}}
            </button>
            <ul class="dropdown-menu text-end" style="right: 0 !important; left: auto; width: 5px !important; padding: 5px;">
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                {{-- <li><a class="dropdown-item" href="#"></a></li> --}}
                {{-- <li><a class="dropdown-item" href="#"></a></li> --}}
                {{-- <hr> --}}
                <li><a class="dropdown-item" href="{{route('logout')}}">Sair</a></li>
            </ul>
        </div>

    </nav>
    <div class="row" id="row-principal">
        <aside class="col-md-2">
            <div>
                <ul class="list-group text-center" id="barra-lateral" style="padding: 10px; display:flex; gap:5px; flex-direction: column">
                    <a class="nav-link" aria-current="page" href="/">Inicio</a>
                    <a class="nav-link" href="{{ route('horario.index') }}">Cadastrar horario</a>
                </ul>
            </div>
        </aside>
        <main class="col-md-10">
            @yield('conteudo')
        </main>
    </div>

    <footer class="text-center">
        <div>
            <a class="btn btn-primary mt-2 mb-2" style="right: 0 !important" href="#"><i class="bi bi-chevron-compact-up"></i></a>
        </div>
    </footer>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
