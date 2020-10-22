<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DireccionSeeder::class);
        $this->call(CategoriaSeeder::class);
        \App\Models\User::factory(10)->create();
        \App\Models\Producto::factory(10)->create();
        $this->call(FabricanteSeeder::class);
    }
}
