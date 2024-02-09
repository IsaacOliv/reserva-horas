<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'nome' => 'Admin',
            'email' => 'isaacoliveirabreu@gmail.com',
            'senha' => bcrypt('12345678a'),
            'remember_token' => \Illuminate\Support\Str::random(10),
            'ativo' => 1,
            'id_tipo' => 1
        ]);
    }
}
