<?php

namespace App\Http\Repository;

class InicioRepository
{
    /**
     * organizaPorDia organiza as horas por dia
     * @return mixed
     */
    public static function organizaPorDia(): mixed
    {
        $dados = \Illuminate\Support\Facades\DB::select('SELECT * FROM horarios ORDER BY dia_semana ASC');
        $grupos = [];
        foreach ($dados as $item) {
            $chave = $item->dia_semana;
            $valores = ['hora_inicio' => $item->hora_inicio, 'hora_fim' => $item->hora_fim];
            $grupos[$chave][] = $valores;
        }
        return $grupos;
    }
}
