<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nombre' => 'Jose',
                'ci' => '12414590',
                'direccion' => 'Santa Cruz de la Sierra/7 calles',
                'telefono' => '75514328',
                'email' => 'jchile@gmail.com',
                'password' => Hash::make('12345'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]   
        ]);
    }
}
