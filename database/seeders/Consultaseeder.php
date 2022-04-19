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
                'fecha_registro' => '2022-04-20',
                'hora_inicio' => '18:00:00',
                'hora_fin' => '19:00:00',
                'idpaciente' => 1,
                'idusuario' => 1,
            ]   
        ]);
    }
}
