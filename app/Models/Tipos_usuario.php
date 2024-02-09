<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipos_usuario extends Model
{
    protected $table = 'tipos_usuarios';
    protected $fillable = [
        'nome'
    ];

}
