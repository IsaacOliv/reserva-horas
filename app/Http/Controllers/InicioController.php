<?php

namespace App\Http\Controllers;

class InicioController extends Controller
{
    public function inicio()
    {
        $diaSemana = new \App\Models\Horario();
        $grupos = \App\Http\Repository\InicioRepository::organizaPorDia();
        return view('inicio.inicio', compact('grupos', 'diaSemana'));
    }
}
