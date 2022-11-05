<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = User::create([
            'name' => 'administrador',
            'email' => 'administrador@gmail.com',
            'password' => Hash::make('admin'),
            'tipo' => '3',
            'id_reserva' => '0',
            'identificacion' => '1111',
            'photo' => 'uploads\/wzLOarHxOm92aBFXhcj20LPfTGCGsnacS1vTdXMW.jpg',
            // 'codigo' => 'administrador',
        ]);

        $agente = User::create([
            'name' => 'agente',
            'email' => 'agente@gmail.com',
            'password' => Hash::make('agente'),
            'tipo' => '1',
            'id_reserva' => '1',
            'identificacion' => '2222',
            'photo' => 'uploads\/2rQ198mRXkNd12AKn43Q5rwuTjqMx5HaAGdtao0t.jpg',
            // 'codigo' => 'agente',
        ]);
        $supervisor = User::create([
            'name' => 'supervisor',
            'email' => 'supervisor@gmail.com',
            'password' => Hash::make('supervisor'),
            'tipo' => '2',
            'id_reserva' => '2',
            'identificacion' => '3333',
            'photo' => 'uploads\/ezFU8YCSbqCp8VZonfyBhd0BusSgdT7tyyALwZyi.jpg',
            // 'codigo' => 'supervisor',
        ]);
    }
}
