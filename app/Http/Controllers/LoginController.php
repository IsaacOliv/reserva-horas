<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logar(\Illuminate\Http\Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->senha, 'ativo' => 1])) {
                $request->session()->regenerate();
                $response['sucesso'] = 'logado com sucesso';
                return response()->json($response);
            } else {
                $response['falha'] = 'Não foi possivel efetuar o login';
                return response()->json($response, 401);
            }
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response);
        }
    }

    public function logout(\Illuminate\Http\Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
