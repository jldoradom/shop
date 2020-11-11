<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'user_id' => 1,
            'total' => 5655,
            'estado' => 'proceso',
            'observaciones' => 'Quiero que se lo envieis a mi prima en Madrid envuelto en papel de regalo',
            'pago' => 'tarjeta',
            'ref' => 'd16dg4xc4g4',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
