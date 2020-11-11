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
            'telefono' => '958542154',
            'direccion_id' => 1,
            'web' => 'www.HP.com',
            'email' => 'hpakard@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('fabricantes')->insert([
            'nombre' => 'Samsung',
            'telefono' => '541651654',
            'direccion_id' => 1,
            'web' => 'www.Samsung.com',
            'email' => 'Samsung@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
