<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class horarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = new \App\Models\Horario();
        return view('admin.cadastrar-horario', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\ValidaCadastrarHorarioRequest $request)
    {
        try {
            $criar = \App\Models\Horario::create($request->all());
            if ($criar) {
                $response['id'] = $criar->id;
                $response['sucesso'] = 'Horario cadastrado!';
                return response()->json($response);
            } else {
                $response['falha'] = 'Não foi possivel cadastrar o horario!';
                return response()->json($response, 401);
            }
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $response = \App\Models\Horario::where('dia_semana', $id)->orderBy('hora_inicio', 'ASC')->get();
            return response()->json($response);
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $verifica = \App\Models\Horario_reservado::where('id_horario', $id)->first();
            if ($verifica) {
                $response['falha'] = 'Não é possivel excluir um horario reservado';
                return response()->json($response);
            } else {
                $deletar = \App\Models\Horario::find($id)->delete();
                if ($deletar) {
                    $response['sucesso'] = 'Horario deletado!';
                    return response()->json($response);
                } else {
                    $response['falha'] = 'Não foi possivel exlucir o horario ou o horario não foi localizado';
                    return response()->json($response);
                }
            }
        } catch (\Exception $ex) {
            $response['falha'] = $ex->getMessage();
            return response()->json($response);
        }
    }
}
