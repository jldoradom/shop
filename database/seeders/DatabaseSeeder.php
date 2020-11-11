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
        $this->call(FabricanteSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\Producto::factory(10)->create();
        // \App\Models\User::factory(3)->create();
        $this->call(PedidoSeeder::class);
        $this->call(LineasPedidoSeeder::class);

    }
}
