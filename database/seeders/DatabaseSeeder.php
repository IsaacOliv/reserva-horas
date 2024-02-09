<?php

namespace Database\Seeders;

use Database\Seeder\Tipos_usuariosSeeder;
use Database\Seeder\UsuarioSeeders;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TiposUsuariosSeeder::class,
            UsuarioSeeder::class,
        ]);

    }
}
