<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;

class HorarioController extends Controller
{

    public function inicio()
    {
        $diaSemana = new \App\Models\Horario();
        $grupos = \App\Http\Repository\InicioRepository::organizaPorDia();
        return view('inicio.reservar-horario.inicio', compact('grupos', 'diaSemana'));
    }

    public function reservar(\Illuminate\Http\Request $request)
    {
        try {
            $id_usuario = \Illuminate\Support\Facades\Auth::user()->id;
            $usuario = \App\Models\User::with('detalhes')->find($id_usuario);
            if (!$usuario->detalhes) {
                $response['falha'] = 'É preciso terminar o cadastro antes de reservar um horario';
                $response['link'] = route('detalhes.da.conta',['id' => $id_usuario]);
                return response()->json($response, 401);
            }
            $id_horario = $request->id_horario;
            $horariosReservados =  new \App\Models\Horario_reservado();
            if ($horariosReservados->where('id_horario', $id_horario)->where('reservado', true)->first()) {
                $response['falha'] = 'Horario já esta reservado';
                return response()->json($response, 401);
            }else{
                $horariosReservados->create([
                    'id_horario' => $id_horario,
                    'id_usuario' => $id_usuario
                ]);
                $response['sucesso'] = 'Horario reservado com sucesso';
            }
            return response()->json($response, 200);

        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response, 401);
        }
    }
}
