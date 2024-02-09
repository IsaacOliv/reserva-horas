<?php

namespace App\Http\Controllers;

class RegistroController extends Controller
{
    public function registro(\App\Http\Requests\ValidarRegistroRequest $request)
    {
        try {
            $criar = [
                'nome' => trim($request->nome),
                'email' => trim($request->email),
                'password' => \Illuminate\Support\Facades\Hash::make($request->senha),
                'id_tipo' => 2
            ];
            $usuario = \App\Models\User::create($criar);
            if ($usuario) {
                $response['sucesso'] = 'Cadastro efetuado com sucesso!';
                return response()->json($response);
            }
            $response['falha'] = 'Não foi possivel efetuar o cadastro!';
            return response()->json($response, 401);
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response);
        }
    }
}
