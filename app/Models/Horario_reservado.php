<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario_reservado extends Model
{
    protected $table = 'horario_reservados';
    protected $fillable = [
        'id_horario',
        'id_usuario'
    ];
}
