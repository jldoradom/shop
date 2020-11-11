<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LineasPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linea_pedidos')->insert([
            'pedido_id' => 1,
            'producto_id' => 5,
            'cantidad' => 2,
            'subtotal' => 31.4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('linea_pedidos')->insert([
            'pedido_id' => 1,
            'producto_id' => 6,
            'cantidad' => 5,
            'subtotal' => 30,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);DB::table('linea_pedidos')->insert([
            'pedido_id' => 1,
            'producto_id' => 9,
            'cantidad' => 1,
            'subtotal' => 25899,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
