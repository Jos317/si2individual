<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Pacienteseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paciente')->insert([
            [
                'nombre' => 'Leonardo',
                'apellido' => 'Mogiano',
                'ci' => '13525681',
                'telefono' => '62152145',
                'direccion' => 'Santa Cruz de la Sierra/5to anillo',
                'sexo' => 'M',
                'fecha_nac' => '2000-02-20',
                'email' => 'mogianos@gmail.com',
                'password' => Hash::make('12345'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Gustavo',
                'apellido' => 'Coronado',
                'ci' => '17362190',
                'telefono' => '71036652',
                'direccion' => 'Santa Cruz de la Sierra/Yapacaní',
                'sexo' => 'M',
                'fecha_nac' => '2000-11-23',
                'email' => 'gustavo@gmail.com',
                'password' => Hash::make('12345'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Takeshi',
                'apellido' => 'Kanashiro',
                'ci' => '8911801',
                'telefono' => '78073371',
                'direccion' => 'Equipetrol/Zona norte/ Av. Los cusis',
                'sexo' => 'M',
                'fecha_nac' => '2001-05-16',
                'email' => 'takeshi@gmail.com',
                'password' => Hash::make('12345'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
