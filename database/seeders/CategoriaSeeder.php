<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nombre' => 'Lector de codigos de barras',
            'id_categoria_padre' => null,
            'slug' => Str::slug('Lector de codigos de barras'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Lector de codigos de barras de mano',
            'id_categoria_padre' => 1,
            'slug' => Str::slug('Lector de codigos de barras de mano'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); DB::table('categorias')->insert([
            'nombre' => 'Impresoras',
            'id_categoria_padre' => null,
            'slug' => Str::slug('Impresoras'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); DB::table('categorias')->insert([
            'nombre' => 'Impresoras de tickets',
            'id_categoria_padre' => 3,
            'slug' => Str::slug('Impresoras de tickets'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
