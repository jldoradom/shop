<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FabricanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fabricantes')->insert([
            'nombre' => 'Hp',
            'pais' => 'USA',
            'telefono' => '958542154',
            'direccion_id' => 1,
            'puerta' => 'b',
            'web' => 'www.HP.com',
            'email' => 'hpakard@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
