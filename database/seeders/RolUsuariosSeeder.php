<?php

namespace Database\Seeders;

use App\Models\RolUsuario;
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

        RolUsuario::create([
            'rol_nombre' => 'Agente',

        ]);
        RolUsuario::create([
            'rol_nombre' => 'Administrador',
        ]);
        RolUsuario::create([
            'rol_nombre' => 'Supervisor'
        ]);
    }
}
