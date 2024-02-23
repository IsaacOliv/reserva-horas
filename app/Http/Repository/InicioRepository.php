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

        $dados = \Illuminate\Support\Facades\DB::select(
            'SELECT DISTINCT(h.id), h.*
            FROM horarios AS h
            LEFT JOIN horario_reservados AS hr ON h.id = hr.id_horario
            WHERE hr.id_horario IS NULL OR hr.reservado != true
            ORDER BY dia_semana ASC');

        $grupos = [];
        foreach ($dados as $item) {
            $chave = $item->dia_semana;
            $valores = ['hora_inicio' => $item->hora_inicio, 'hora_fim' => $item->hora_fim, 'id' => $item->id];
            $grupos[$chave][] = $valores;
        }
        return $grupos;
    }
}
