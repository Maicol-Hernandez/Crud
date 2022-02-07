<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RolUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('rol_usuarios')->insert(
            [
                'rol_nombre' => 'Agente',

            ],
        );
        DB::table('rol_usuarios')->insert(
            [
                'rol_nombre' => 'Administrador',

            ],
        );
        DB::table('rol_usuarios')->insert(
            [
                'rol_nombre' => 'Supervisor'

            ],
        );
    }
}
