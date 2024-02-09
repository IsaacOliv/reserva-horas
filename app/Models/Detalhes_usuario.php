<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalhes_usuario extends Model
{
    protected $table = 'detalhes_usuarios';

    protected $fillable = [
        'imagem_perfil',
        'cpf',
        'telefone',
        'endereco',
        'dt_nascimento',
        'id_usuario',
    ];
    protected $casts = [
        'dt_nascimento' => 'datetime:Y-m-d'
    ];
}
