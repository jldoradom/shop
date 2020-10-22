<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('direccions')->insert([
            'tipo_via' => 'calle',
            'nombre_via' => 'brisa del mar',
            'numero' => '15',
            'planta' => '2ª',
            'puerta' => 'b',
            'localidad' => 'Ronda',
            'provincia' => 'Malaga',
            'pais' => 'España',
            'codigo_postal' => '29790',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
