<?php

namespace App\Models;

use App\Casts\TimeCast;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = [
        'dia_semana',
        'hora_inicio',
        'hora_fim'
    ];
    protected $casts = [
        'hora_inicio' => TimeCast::class,
        'hora_fim' => TimeCast::class,
    ];

    public function getDiaSemana($dia_semana = null)
    {
        if ($dia_semana == null) {
            $dia_semana = $this->dia_semana;
        }
        switch ($dia_semana) {
            case '1':
                return 'Domingo';
                break;
            case '2':
                return 'Segunda-feira';
                break;
            case '3':
                return 'Terça-feira';
                break;
            case '4':
                return 'Quarta-feira';
                break;
            case '5':
                return 'Quinta-feira';
                break;
            case '6':
                return 'Sexta-feira';
                break;
            case '7':
                return 'Sabado';
                break;
            default:
                return 'DATA INVALIDA';
                break;
        }
    }
}
