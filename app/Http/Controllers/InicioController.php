<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{

    public function inicio()
    {
        $diaSemana = new \App\Models\Horario();
        $grupos = \App\Http\Repository\InicioRepository::organizaPorDia();
        return view('inicio.inicio', compact('grupos', 'diaSemana'));
    }

    public function alterarTema()
    {
        $userID = Auth::user()->id;
        $user = \App\Models\User::find($userID);
        $update = $user->update(['tema' => !$user->tema]);

        if ($update) {
            $response['tema'] = $user->getTema()['tema'];
            $response['icone'] = $user->getTema()['icone'];
        }
        return response()->json($response, 200);
    }


}
