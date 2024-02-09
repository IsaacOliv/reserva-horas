<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipos_usuario;

class TiposUsuariosSeeder extends Seeder
{
    public function run()
    {
        Tipos_usuario::insert([
            [
            'id' => 1,
            'nome' => 'admin'
            ],[
            'id' => 2,
            'nome' => 'cliente'
            ]
        ]);
    }
}
