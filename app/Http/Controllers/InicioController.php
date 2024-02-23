<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{

    public function inicio()
    {
        return view('inicio.inicio');
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
