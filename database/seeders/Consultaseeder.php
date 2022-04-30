<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Consultaseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consulta')->insert([
            [
                'motivo' => 'fiebre por 5 dias seguidos y tos interminable',
                'inicio' => '2022-04-20 18:00:00',
                'fin' => '2022-04-20 19:00:00',
                'idpaciente' => 1,
                'idusuario' => 1,
            ],
            [
                'motivo' => 'falta de apetito en 2 dias',
                'inicio' => '2022-04-21 08:00:00',
                'fin' => '2022-04-21 09:00:00',
                'idpaciente' => 1,
                'idusuario' => 2,
            ],
            [
                'motivo' => 'Fiebre alta, dolor de la garganta y escalofrios',
                'inicio' => '2022-04-22 10:00:00',
                'fin' => '2022-04-22 11:00:00',
                'idpaciente' => 2,
                'idusuario' => 1,
            ],
            [
                'motivo' => 'dolor en la espalda grave',
                'inicio' => '2022-04-22 13:00:00',
                'fin' => '2022-04-22 14:00:00',
                'idpaciente' => 2,
                'idusuario' => 1,
            ]   
        ]);
    }
}
